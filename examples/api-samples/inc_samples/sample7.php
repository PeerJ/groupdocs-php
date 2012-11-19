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
       // $api->setBasePath("http://localhost:7000/v2.0");
        $files = $api->ListEntities($clientId, "", null, null, null, null, null, null, true); //geting all Entities from curent user
        $thumbnail = '';
        $name = '';
        for ($i=0; $i < count($files->result->files); $i++)
        {
            if($files->result->files[$i]->thumbnail !== "")
            {
            $fp = fopen(__DIR__ . '/../temp/thumbnail' . $i . '.jpg', 'w');
            fwrite($fp, base64_decode($files->result->files[$i]->thumbnail));
            fclose($fp);
            $thumbnail .= '<img src= "/temp/thumbnail' . $i . '.jpg", width="40px", height="40px">'
                          .$name = $files->result->files[$i]->name . '</img> <br>';
            $name = $files->result->files[$i]->name;
            }            
        }
        F3::set('thumbnailList', $thumbnail);
    }
    echo Template::serve('sample7.htm');