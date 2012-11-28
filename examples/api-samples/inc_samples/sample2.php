<?php

    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    
    function FileList($clientId, $privateKey)
    {
        if (empty($clientId) || empty($privateKey)) {
            throw new Exception('Please enter all required parameters');
        } else {
            $signer = new GroupDocsRequestSigner($privateKey);
            $apiClient = new APIClient($signer); // PHP SDK V1.1
            $api = new StorageApi($apiClient);
            $files = $api->ListEntities($clientId, '', 0); //geting all Entities from curent user
            $name = '';
            
            //selecting file names
            foreach ($files->result->files as $item) {
                $name .= $item->name . '<br>';
            }

           return F3::set('filelist', $name);
        }
    }
    
    try {
        FileList($clientId, $privateKey);
    } catch(Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }
    
    F3::set('userId', $clientId);
    F3::set('privateKey', $privateKey);
    echo Template::serve('sample2.htm');