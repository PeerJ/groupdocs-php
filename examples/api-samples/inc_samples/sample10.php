<?php
    //<i>This sample will show how to use <b>ShareDocument</b> method from Doc Api to share a document to other users</i>

    //###Set variables and get POST data

    F3::set('userId', '');
    F3::set('privateKey', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $email = f3::get('POST["email"]');
    $sharer = array($email);
    
    function Share($userId, $privateKey, $body)
    {
        //### Check file id, user, private key and body
        if ($userId == "" || $privateKey == "" || $body == "") {
            throw new Exception('Please enter all required parameters');
        } else {
            //Get base path
            $basePath = f3::get('POST["server_type"]');
            //Get entered by user data
            $url = F3::get('POST["url"]');
            $file = $_FILES['file'];
            $fileId = f3::get('POST["fileId"]');
            $file_id = "";
            //###Create Signer, ApiClient and Storage Api objects

            //Create signer object
            $signer = new GroupDocsRequestSigner($privateKey);
            //Create apiClient object
            $apiClient = new APIClient($signer);
            //Create Storage Api object
            $api = new StorageApi($apiClient);
             if ($basePath == "") {
                //If base base is empty seting base path to prod server
                $basePath = 'https://api.groupdocs.com/v2.0';
            }
            //Set base path
            $api->setBasePath($basePath);
            //Check if user choose upload file from URL
            if ($url != "") {
                //Upload file from URL
                $uploadResult = $api->UploadWeb($userId, $url);
                //Check is file uploaded
                if ($uploadResult->status == "Ok") {
                    //Get file GUID
                    $file_id = $uploadResult->result->id;
                    $fileId = "";
                //If it isn't uploaded throw exception to template
                } else {
                    throw new Exception($uploadResult->error_message);
                }
            }
            //Check is user choose upload local file
            if ($_FILES['file']["name"] != "") {
                //Temp name of the file
                $tmp_name = $file['tmp_name']; 
                //Original name of the file
                $name = $file['name'];
                //Creat file stream
                $fs = FileStream::fromFile($tmp_name);
                //###Make a request to Storage API using clientId
                //Upload file to current user storage
                $uploadResult = $api->Upload($userId, $name, 'uploaded', "", $fs);

                //###Check if file uploaded successfully
                if ($uploadResult->status == "Ok") {
                    //Get file GUID
                    $file_id = $uploadResult->result->id;
                    $fileId = "";
                   
                //If it isn't uploaded throw exception to template
                } else {
                    throw new Exception($uploadResult->error_message);
                }
            }
            if ($fileId != "") {
                //###Make request to Storage

                //Geting all Entities from current user
                $files = $api->ListEntities($userId, '', 0);
                //Selecting file names
                $name = '';
                foreach ($files->result->files as $item)
                {
                   if ($item->guid == $fileId) {
                    $name = $item->name;
                    $file_id = $item->id;
                    
                   }
                }
                f3::set('fileId', $item->guid);
            }
            //###Create DocApi object
            $docApi = new DocApi($apiClient);
            $docApi->setBasePath($basePath);
            //Make request to user storage for sharing document
         
            $URL = $docApi->ShareDocument($userId, $file_id, $body);
            //If request was successfull - set shared variable for template
            
            return f3::set('shared', $body['0']);
        }
    }
    
    try {
        Share($clientId, $privateKey, $sharer);
    } catch(Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }
    //Process template
    F3::set('userId', $clientId);
    F3::set('privateKey', $privateKey);
    
    f3::set('email', $email);
    echo Template::serve('sample10.htm');