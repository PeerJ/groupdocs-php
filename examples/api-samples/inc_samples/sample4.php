<?php

    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $file_id = F3::get('POST["file_id"]');
    if (isset($clientId) AND isset($privateKey))
    {
        F3::set('userId', $clientId);
        F3::set('privateKey', $privateKey);
        F3::set('file_Id', $file_id);
        $outFileStream =  FileStream::fromHttp(dirname(__FILE__). '/../temp', "myfile.png");
        
        $signer = new GroupDocsRequestSigner($privateKey);
        $apiClient = new APIClient($signer); // PHP SDK V1.1

        $api = new StorageApi($apiClient);
        $file = $api->GetFile($clientId, $file_id, $outFileStream); //download file
       
    }
    
    echo Template::serve('sample4.htm');