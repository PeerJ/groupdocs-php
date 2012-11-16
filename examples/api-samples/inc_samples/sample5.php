<?php

    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $file_id = F3::get('POST["file_id"]');
    $copy = F3::get('POST["copy"]');
    $move = F3::get('POST["move"]');
    $folder = F3::get('POST["folder"]');
    if (isset($clientId) AND isset($privateKey))
    {
        $signer = new GroupDocsRequestSigner($privateKey);
        $apiClient = new APIClient($signer); // PHP SDK V1.1
        $api = new StorageApi($apiClient);
        $api->setBasePath("http://localhost:7000/v2.0");
        $files = $api->ListEntities($clientId, '', 0);
       
        foreach ($files->result->files as $item) //selecting file names
        {
           if($item->guid == $file_id)
           {
            $name = $item->name;
           }
        }
        
        if (isset($copy))
        {
             
           $path = $folder . '/' . $name;
           $file = $api->MoveFile($clientId, $path, NULL, $file_id, NULL); //download file
           
           F3::set('button', $copy);
           
        }
        
        if (isset($move))
        {
             
           $path = $folder . '/' . $name;
           $file = $api->MoveFile($clientId, $path, NULL, NULL, $file_id); //download file
          
           F3::set('button', $move);
           
        }
        
        F3::set('userId', $clientId);
        F3::set('privateKey', $privateKey);
        F3::set('file_Id', $file_id);
        F3::set('folder', $folder);
       
    }
    
    echo Template::serve('sample5.htm');