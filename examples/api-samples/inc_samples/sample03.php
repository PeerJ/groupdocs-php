<?php

//<i>This sample will show how to use <b>Upload</b> method from Storage Api to upload file to GroupDocs Storage </i>
//###Set variables and get POST data
F3::set('userId', '');
F3::set('privateKey', '');
F3::set('fileId', '');
F3::set('message', '');
F3::set('iframe', '');
F3::set('basePath', '');
$clientId = F3::get('POST["client_id"]');
$privateKey = F3::get('POST["private_key"]');
$basePath = f3::get('POST["server_type"]');
$url = F3::get('POST["url"]');

function upload($clientId, $privateKey, $basePath, $url) {
    //###Check clientId and privateKey
    if (empty($clientId) || empty($privateKey)) {
        throw new Exception('Please enter all required parameters');
    } else {
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
        //Check if user entered base path
        if ($basePath == "") {
            //If base base is empty seting base path to prod server
            $basePath = 'https://api.groupdocs.com/v2.0';
        }
        //Set base path
        $apiStorage->setBasePath($basePath);
        //Check URL entered
        if ($url != "") {
            //Upload file from URL
            $uploadResult = $apiStorage->UploadWeb($clientID, $url);
            //Check upload status
            if ($uploadResult->status == "Ok") {
                //Get file GUID
                $guid = $uploadResult->result->guid;
            } else {
                throw new Exception($uploadResult->error_message);
            }
        } else {
            //Get uploaded file
            $uploadedFile = $_FILES['file'];
            //###Check uploaded file
            if (null === $uploadedFile) {
                return new RedirectResponse("/sample3");
            }
            //Temp name of the file
            $tmp_name = $uploadedFile['tmp_name'];
            //Original name of the file
            $name = $uploadedFile['name'];
            //Creat file stream
            $fs = FileStream::fromFile($tmp_name);
            //###Make a request to Storage API using clientId
            $callbackUrl = f3::get('POST["callbackUrl"]');
            F3::set("callbackUrl", $callbackUrl);
            //Upload file to current user storage
            $uploadResult = $apiStorage->Upload($clientID, $name, 'uploaded', $callbackUrl, $fs);

            //###Check if file uploaded successfully
            if ($uploadResult->status == "Ok") {
                //Get file GUID
                $guid = $uploadResult->result->guid;
            } else {
                throw new Exception($uploadResult->error_message);
            }
        }
        if ($basePath == "https://api.groupdocs.com/v2.0") {
            $iframe = 'http://apps.groupdocs.com/document-viewer/embed/' . $guid;
            //iframe to dev server
        } elseif ($basePath == "https://dev-api.groupdocs.com/v2.0") {
            $iframe = 'http://dev-apps.groupdocs.com/document-viewer/embed/' . $guid;
            //iframe to test server
        } elseif ($basePath == "https://stage-api.groupdocs.com/v2.0") {
            $iframe = 'http://stage-apps.groupdocs.com/document-viewer/embed/' . $guid;
            //Iframe to realtime server
        } elseif ($basePath == "http://realtime-api.groupdocs.com") {
            $iframe = 'http://realtime-apps.groupdocs.com/document-viewer/embed/' . $guid;
        }

        //Generation of Embeded Viewer URL with uploaded file GuId
        $result = '<iframe src="' . $iframe . '" frameborder="0" width="800" height="650"></iframe>';
        //If request was successfull - set result variable for template
        return $result;
    }
}

try {
    $upload = upload($clientId, $privateKey, $basePath, $url);
    $message = '<p>File was uploaded to GroupDocs. Here you can see your file in the GroupDocs Embedded Viewer.</p>';
    F3::set('message', $message);
    F3::set('iframe', $upload);
} catch (Exception $e) {
    $error = 'ERROR: ' . $e->getMessage() . "\n";
    f3::set('error', $error);
}
//Process template
F3::set('userId', $clientId);
F3::set('privateKey', $privateKey);
F3::set('basePath', $basePath);
echo Template::serve('sample03.htm');
