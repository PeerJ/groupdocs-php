<?php

    F3::set('userId', '');
    F3::set('privateKey', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $fileGuId = f3::get('POST["fileId"]');
    $email = f3::get('POST["email"]');
    $sharer = array($email);
    
    function Share($userId, $privateKey, $file_Id, $body)
    {
        if ($file_Id == "" || $userId == "" || $privateKey == "" || $body == "") {
            throw new Exception('Please enter FILE ID');
        } else {
            $signer = new GroupDocsRequestSigner($privateKey);
            $apiClient = new APIClient($signer); // PHP SDK V1.1
            $api = new StorageApi($apiClient);
            $files = $api->ListEntities($userId, '', 0);
            $name = '';
            foreach ($files->result->files as $item) //selecting file names
            {
               if ($item->guid == $file_Id) {
                $name = $item->name;
                $file_id = $item->id;
               }
            }
            $docApi = new DocApi($apiClient);
            $URL = $docApi->ShareDocument($userId, $file_id, $body);
            
            return f3::set('shared', $body['0']);
        }
    }
    
    try {
        Share($clientId, $privateKey, $fileGuId, $sharer);
    } catch(Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }
    
    F3::set('userId', $clientId);
    F3::set('privateKey', $privateKey);
    f3::set('fileId', $fileGuId);
    f3::set('email', $email);
    echo Template::serve('sample10.htm');