<?php

    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    if (isset($clientId) AND isset($privateKey))
    {
        F3::set('userId', $clientId);
        F3::set('privateKey', $privateKey);
        
        $signer = new GroupDocsRequestSigner($privateKey);
        $apiClient = new APIClient($signer); // PHP SDK V1.1
        $mgmtApi = new MgmtApi($apiClient);
        $userAccountInfo = $mgmtApi->GetUserProfile($clientId);
        $api = new StorageApi($apiClient);
        $files = $api->ListEntities($clientId, '', 0); //geting all Entities from curent user
        $name = '';
        foreach ($files->result->files as $item) //selecting file names
        {
            $name .= $item->name . '<br>';
        }
           
        F3::set('filelist', $name);
    
    }
    
    echo Template::serve('sample2.htm');