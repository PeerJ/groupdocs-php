<?php

    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $file_id = F3::get('POST["file_id"]');
    
    function Download($clientId, $privateKey, $file_id)
    {
        if (!isset($clientId) || !isset($privateKey) || !isset($file_id))
        {
            throw new Exception('You do not enter all parameters');
        }
        else
        {
            $signer = new GroupDocsRequestSigner($privateKey);
            $apiClient = new APIClient($signer); // PHP SDK V1.1
            $api = new StorageApi($apiClient);
            $files = $api->ListEntities($clientId, '', 0);
            foreach ($files->result->files as $item) //selecting file names
            {
               if($item->guid == $file_id)
               {
                $name = $item->name;
               }
            }
            $outFileStream =  FileStream::fromHttp(dirname(__FILE__). '/../temp', $name);
            $file = $api->GetFile($clientId, $file_id, $outFileStream); //download file
            $massage = '<font color="green">File was downloaded to the <font color="blue">' . $outFileStream->downloadDirectory . '</font> folder</font> <br />';
            return f3::set('massage', $massage);
        }
    }   
    try
    {
        Download($clientId, $privateKey, $file_id);
    }
    catch (Exception $e)
    {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }
    F3::set('userId', $clientId);
    F3::set('privateKey', $privateKey);
    F3::set('file_Id', $file_id);
    
    echo Template::serve('sample4.htm');