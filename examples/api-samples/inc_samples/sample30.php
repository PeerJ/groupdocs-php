<?php

//###This sample will show how to delete file from GroupDocs account
//### Set variables and get POST data
F3::set('userId', '');
F3::set('privateKey', '');
F3::set('fileId', '');

$clientId = F3::get('POST["client_id"]');
$privateKey = F3::get('POST["private_key"]');
$fileId = F3::get('POST["fileId"]');

function deleteFile($clientId, $privateKey, $fileId) {
    if (empty($clientId) || empty($privateKey) || empty($fileId)) {
        $error = 'Please enter all required parameters';
        f3::set('error', $error);
    } else {
        //Get base path
        $basePath = f3::get('POST["server_type"]');
        F3::set('userId', $clientId);
        F3::set('privateKey', $privateKey);
        F3::set('fileId', $fileId);

        #### Create Signer, ApiClient and Annotation Api objects
        # Create signer object
        $signer = new GroupDocsRequestSigner($privateKey);
        # Create apiClient object
        $apiClient = new ApiClient($signer);
        # Create Storage object
        $storageApi = new StorageApi($apiClient);
        # Delete file from Api Storage
        try {
            $delFile = $storageApi->Delete($clientId, $fileId);
            // Check the result of the request
            if ($delFile->status == "Ok") {
                // If status "ok" - show Mesege
                $message = '<span style="color: green">Done, file deleted from your GroupDocs Storage </span>';
            } else {
                $message = '<span style="color: red">Error, this file not exists or file was deleted  </span>';
            }
            return F3::set('message', $message);
        } catch (Exception $e) {
            $error = 'ERROR: ' . $e->getMessage() . "\n";
            f3::set('error', $error);
        }
    }
}

deleteFile($clientId, $privateKey, $fileId);
// Process template
echo Template::serve('sample30.htm');