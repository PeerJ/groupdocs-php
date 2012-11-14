<?php

    F3::set('userId', '');
    F3::set('privateKey', '');
    F3::set('fileId', '');
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
        F3::set('userInfo', $userAccountInfo->result->user);
        //echo var_dump(F3::get('userInfo')); exit();
        //echo var_dump($userAccountInfo); exit();
    }
    
    echo Template::serve('sample1.htm');