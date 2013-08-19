<?php

//<i>This sample will show how to Create and Upload Envelop to GroupDocs account using PHP SDK </i>
//###Set variables and get POST data
F3::set('userId', '');
F3::set('privateKey', '');
F3::set('fileId', '');
F3::set('message', '');
F3::set('iframe', '');
$clientId = F3::get('POST["client_id"]');
$privateKey = F3::get('POST["private_key"]');
$email = f3::get('POST["email"]');
$signName = f3::get('POST["name"]');
$lastName = f3::get('POST["lastName"]');
f3::set('email', $email);
f3::set('name', $signName);
f3::set('lastName', $lastName);

function sendEnvelop($clientId, $privateKey, $email, $signName, $lastName) {
    //###Check clientId and privateKey
    if (empty($clientId) || empty($privateKey)) {
        throw new Exception('Please enter all required parameters');
    } else {
        //path to settings file - temporary save userId and apiKey like to property file
        $infoFile = fopen(__DIR__ . '/../user_info.txt', 'w');
        fwrite($infoFile, $clientId . "\r\n" . $privateKey);
        fclose($infoFile);
        //check if Downloads folder exists and remove it to clean all old files
        if (file_exists(__DIR__ . '/../downloads')) {
            delFolder(__DIR__ . '/../downloads/');
        }
        //Deleting of tags, slashes and  space from clientId and privateKey
        $clientID = strip_tags(stripslashes(trim($clientId))); //ClientId==UserId
        $apiKey = strip_tags(stripslashes(trim($privateKey))); //ApiKey==PrivateKey
        //###Create Signer, ApiClient and Storage Api objects
        //Create signer object
        $signer = new GroupDocsRequestSigner($apiKey);
        //Create apiClient object
        $apiClient = new APIClient($signer);
        //Create Storage Api object
        $apiStorage = new StorageApi($apiClient);
        $basePath = f3::get('POST["server_type"]');
        //Declare which Server to use
        if ($basePath == "") {
            //If base base is empty seting base path to prod server
            $basePath = 'https://api.groupdocs.com/v2.0';
        }
        //Set base path
        $apiStorage->setBasePath($basePath);
        //Get entered by user data
        $name = "";
        $fileGuId = "";
        $url = F3::get('POST["url"]');
        $file = $_FILES['file'];
        $fileId = f3::get('POST["fileId"]');
        //Check is URL entered
        if ($url != "") {
            //Upload file from URL
            $uploadResult = $apiStorage->UploadWeb($clientID, $url);
            //Check is file uploaded
            if ($uploadResult->status == "Ok") {
                //Get file GUID
                $fileGuId = $uploadResult->result->guid;
                //###Make a request to Storage API using clientId
                //Obtaining all Entities from current user
                $files = $apiStorage->ListEntities($clientID, 'My Web Documents', 0);
                //Obtaining file name and id by fileGuID
                foreach ($files->result->files as $item) {
                    if ($item->guid == $fileGuId) {
                        $name = $item->name;
                    }
                }
                //If it isn't uploaded throw exception to template
            } else {
                throw new Exception($uploadResult->error_message);
            }
        }
        //Check is local file chosen
        if ($file["name"] != "") {
            //Get uploaded file
            $uploadedFile = $_FILES['file'];


            //###Check uploaded file
            if (null === $uploadedFile) {
                return new RedirectResponse("/sample21");
            }
            //Temp name of the file
            $tmp_name = $uploadedFile['tmp_name'];
            //Original name of the file
            $name = $uploadedFile['name'];
            //Creat file stream
            $fs = FileStream::fromFile($tmp_name);


            //###Make a request to Storage API using clientId
            //Upload file to current user storage
            $uploadResult = $apiStorage->Upload($clientID, $name, 'uploaded', "", $fs);
            //###Check if file uploaded successfully
            if ($uploadResult->status == "Ok") {
                $fileGuId = $uploadResult->result->guid;
                $name = $uploadResult->result->adj_name;
            } else {
                throw new Exception($uploadResult->error_message);
            }
        }
        //Check is user choose file GUID
        if ($fileId != "") {
            //Get entered by user file GUID
            $fileGuId = $fileId;
            //###Make a request to Storage API using clientId
            //Obtaining all Entities from current user
            $files = $apiStorage->ListEntities($clientID, '', 0);
            //Obtaining file name and id by fileGuID
            foreach ($files->result->files as $item) {
                if ($item->guid == $fileGuId) {
                    $name = $item->name;
                }
            }
        }

        //Create SignatureApi object
        $signature = new SignatureApi($apiClient);
        $signature->setBasePath($basePath);

        //Create envilope using user id and entered by user name
        $envelop = $signature->CreateSignatureEnvelope($clientID, $name);
        if ($envelop->status == "Ok") {
            sleep(5);
            //Add uploaded document to envelope

            $addDocument = $signature->AddSignatureEnvelopeDocument($clientID, 
                    $envelop->result->envelope->id, $fileGuId);
            if ($addDocument->status == "Ok") {
                //Get role list for curent user
                $recipient = $signature->GetRolesList($clientID);
                if ($recipient->status == "Ok") {
                    //Get id of role which can sign
                    for ($i = 0; $i < count($recipient->result->roles); $i++) {
                        if ($recipient->result->roles[$i]->name == "Signer") {
                            $roleId = $recipient->result->roles[$i]->id;
                        }
                    }
                    //Add recipient to envelope
                    $addRecipient = $signature->AddSignatureEnvelopeRecipient($clientID, 
                            $envelop->result->envelope->id, $email, $signName, $lastName, $roleId, null);
                    if ($addRecipient->status == "Ok") {
                        //Get recipient id
                        $getRecipient = $signature->GetSignatureEnvelopeRecipients($clientID, 
                                $envelop->result->envelope->id);
                        if ($getRecipient->status == "Ok") {
                            $recipientId = $getRecipient->result->recipients[0]->id;
                            //Url for callback
                            $callbackUrl = f3::get('POST["callbackUrl"]');
                            F3::set("callbackUrl", $callbackUrl);
                            $getDocuments = $signature->GetSignatureEnvelopeDocuments($clientID, 
                                    $envelop->result->envelope->id);
                            if ($getDocuments->status == "Ok") {
                                $getFields = $signature->GetSignatureEnvelopeFields($clientID, 
                                        $envelop->result->envelope->id, 
                                        $getDocuments->result->documents[0]->documentId, 
                                        $recipientId);
                                if ($getFields->status == "Ok") {
                                    $fields = $getFields->result->fields;
                                    if (count($fields) == 0) {
                                        throw new Exception("You use a wrong file, it's don't content any fields for sign");
                                    }
                                    for ($n = 0; $n < count($fields); $n++) {
                                        $addEnvelopField = $signature->AddSignatureEnvelopeField($clientID, 
                                                $envelop->result->envelope->id, 
                                                $getDocuments->result->documents[0]->documentId, 
                                                $recipientId, $fields[$n]->id);
                                    }
                                    $send = $signature->SignatureEnvelopeSend($clientID, 
                                            $envelop->result->envelope->id, $callbackUrl);
                                    if ($send->status == "Ok") {
                                        if ($basePath == "https://api.groupdocs.com/v2.0") {
                                            //iframe to prodaction server
                                            $iframe = '<iframe src="https://apps.groupdocs.com/signature/signembed/' . 
                                                    $envelop->result->envelope->id . '/' . $recipientId . '?frameborder="0" width="720" height="600"></iframe>';
                                            //iframe to dev server
                                        } elseif ($basePath == "https://dev-api.groupdocs.com/v2.0") {
                                            $iframe = '<iframe src="https://dev-apps.groupdocs.com/signature/signembed/' . 
                                                    $envelop->result->envelope->id . '/' . $recipientId . '?frameborder="0" width="720" height="600"></iframe>';
                                            //iframe to test server
                                        } elseif ($basePath == "https://stage-api.groupdocs.com/v2.0") {
                                            $iframe = '<iframe src="https://stage-apps.groupdocs.com/signature/signembed/' .
                                                    $envelop->result->envelope->id . '/' . $recipientId . '?frameborder="0" width="720" height="600"></iframe>';
                                        } elseif ($basePath == "http://realtime-api.groupdocs.com") {
                                            $iframe = 'http://realtime-apps.groupdocs.com/signature/signembed/' . 
                                                    $envelop->result->envelope->id . '/' . $recipientId . '?frameborder="0" width="720" height="600"></iframe>';
                                        }
                                    } else {
                                        throw new Exception($send->error_message);
                                    }
                                } else {
                                    throw new Exception($getFields->error_message);
                                }
                            } else {
                                throw new Exception($getDocuments->error_message);
                            }
                        } else {
                            throw new Exception($getRecipient->error_message);
                        }
                    } else {
                        throw new Exception($addRecipient->error_message);
                    }
                } else {
                    throw new Exception($recipient->error_message);
                }
            } else {
                throw new Exception($addDocument->error_message);
            }
        } else {
            throw new Exception($envelop->error_message);
        }
        $result = array();
        //Make iframe
        $result = array('iframe' => $iframe,
            'name' => $name);
        //If request was successfull - set result variable for template
        return $result;
    }
}

//### Delete downloads folder and all files in this folder
function delFolder($path) {
    $next = null;
    $item = array();
    //Get all items fron folder
    $item = scandir($path);
    //Remove from array "." and ".."
    $item = array_slice($item, 2);
    //Check is there was files
    if (count($item) > 0) {
        //Delete files from folder
        for ($i = 0; $i < count($item); $i++) {
            $next = $path . "\\" . $item[$i];
            if (file_exists($next)) {
                unlink($next);
            }
        }
    }
    //Delete folder
    rmdir($path);
}

try {
    $upload = sendEnvelop($clientId, $privateKey, $email, $signName, $lastName);
    $message = '<p>File was uploaded to GroupDocs. Here you can see your <strong>' . 
            $upload['name'] . '</strong> file in the GroupDocs Embedded Viewer.</p>';
    F3::set('message', $message);
    F3::set('iframe', $upload['iframe']);
} catch (Exception $e) {
    $error = 'ERROR: ' . $e->getMessage() . "\n";
    f3::set('error', $error);
}
//Process template
F3::set('userId', $clientId);
F3::set('privateKey', $privateKey);
echo Template::serve('sample21.htm');
