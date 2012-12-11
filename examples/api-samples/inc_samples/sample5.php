<?php

    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $fileName = F3::get('POST["srcPath"]');
    $copy = F3::get('POST["copy"]');
    $move = F3::get('POST["move"]');
    $path = F3::get('POST["destPath"]');
    
    function copy_move($clientId, $privateKey, $fileName, $move=NULL, $copy=NULL, $path)
    {
        if (!isset($clientId) || !isset($privateKey) || !isset($fileGuId)) {
			
			throw new Exception('You do not enter all parameters');
			
        }else{   
		
			$signer = new GroupDocsRequestSigner($privateKey);
            $apiClient = new APIClient($signer); // PHP SDK V1.1
            $api = new StorageApi($apiClient);
            $files = $api->ListEntities($clientId, '', 0);
            $name = '';
            $file_id = '';
			
            foreach ($files->result->files as $item) //selecting file names
            {
               if ($item->guid == $fileGuId) {
                   $name = $item->name;
                   $file_id = $item->id;
               }
            }

            if (isset($copy)) {
               $path = $folder . '/' . $name;
               //$path = $folder . '/' . $fileName;               $file = $api->MoveFile($clientId, $path, NULL, $file_id, NULL); //download file

               return  F3::set('button', $copy);
            }

            if (isset($move)) {
               $path = $folder . '/' . $name;
               $file = $api->MoveFile($clientId, $path, NULL, NULL, $file_id); //download file

               return F3::set('button', $move);
            }
         } 
    }
    
    try {
        copy_move($clientId, $privateKey, $fileName, $move, $copy, $path);
        $massage = "File was {{@button}}'ed to the {{@folder}} folder";
    } catch(Exception $e) {

        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        $massage = $error;
    }
    
    F3::set('userId', $clientId);
    F3::set('privateKey', $privateKey);
    F3::set('file_Name', $fileName);
    F3::set('folder', $path);
    f3::set('massage', $massage);
    
    echo Template::serve('sample5.htm');