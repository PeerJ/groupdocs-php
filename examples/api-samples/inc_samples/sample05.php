<?php
   //<i>This sample will show how to use <b>MoveFile</b> method from Storage Api to copy/move a file in GroupDocs Storage </i>

    //###Set variables and get POST data
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $fileName = F3::get('POST["srcPath"]');
    $copy = F3::get('POST["copy"]');
    $move = F3::get('POST["move"]');
    $folder = F3::get('POST["destPath"]');
    
    function copy_move($clientId, $privateKey, $fileName, $move=NULL, $copy=NULL, $folder)
    {
        //###Check clientId, privateKey and file Id
        if (!isset($clientId) || !isset($privateKey) || !isset($fileName)) {
			
			throw new Exception('You do not enter all parameters');
			
        }else{   
           //Get base path
           $basePath = f3::get('POST["server_type"]');
            //###Create Signer, ApiClient and Storage Api objects

            //Create signer object
			$signer = new GroupDocsRequestSigner($privateKey);
            //Create apiClient object
            $apiClient = new APIClient($signer); 
            //Create Storage Api object
            $api = new StorageApi($apiClient);
            //Check if user entered base path
            if ($basePath == "") {
                //If base base is empty seting base path to prod server
                $basePath = 'https://api.groupdocs.com/v2.0';
            }
            //Set base path
            $api->setBasePath($basePath);
            //Set empty file id
            $file_id = '';
            //Get entered URL
            $url = F3::get('POST["url"]');
            //Check is URL entered
            if ($url != "") {
                //Upload file from URL
                $uploadResult = $api->UploadWeb($clientId, $url);
                //Check upload status
                if ($uploadResult->status == "Ok") {
                    //Get file GUID
                    $file_id = $uploadResult->result->guid;
                } else {
                    throw new Exception($uploadResult->error_message);
                }
            }
            //Check is local file chosen
            if ($_FILES['file']["name"] != "") {
                //Get uploaded file
                $uploadedFile = $_FILES['file'];
                //###Check uploaded file
                
                //Temp name of the file
                $tmp_name = $uploadedFile['tmp_name']; 
                //Original name of the file
                $name = $uploadedFile['name'];
                //Creat file stream
                $fs = FileStream::fromFile($tmp_name);
                //###Make a request to Storage API using clientId
                //Upload file to current user storage
                $uploadResult = $api->Upload($clientId, $name, 'uploaded', "", $fs);

                //###Check if file uploaded successfully
                if ($uploadResult->status == "Ok") {
                    //Get file GUID
                    $file_id = $uploadResult->result->guid;
                }
            }
            //###Make a request to Storage API using clientId
            
            //Obtaining all Entities from current user
            $files = $api->ListEntities($clientId, '', 0);
            //Obtaining file name and id by fileGuID
            $name = '';
            foreach ($files->result->files as $item)
            {
               if ($item->guid == $fileName) {
                   $name = $item->name;
                   $file_id = $item->id;
               }
            }
            //###Make request for file copying/movement
            
            //Where to copy/move file
            $path = $folder . '/' . $name;
            //If user choose copy
            if (isset($copy)) {
               //Request to Storage for copying
               $file = $api->MoveFile($clientId, $path, NULL, $file_id, NULL); //download file
               //Returning to Viewer what button was pressed
               return  F3::set('button', $copy);
            }
            //If user choose move
            if (isset($move)) {
               //Request to Storage for copying
               $file = $api->MoveFile($clientId, $path, NULL, NULL, $file_id); //download file
                //If request was successfull - set button variable for template
               return F3::set('button', $move);
            }
           
         } 
    }
    
    try {
        copy_move($clientId, $privateKey, $fileName, $move, $copy, $folder);
        $message = 'File was {{@button}}\'ed to the <font color="blue">{{@folder}}</font> folder';
    } catch(Exception $e) {

        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        $message = $error;
    }
    //Process template
    F3::set('userId', $clientId);
    F3::set('privateKey', $privateKey);
    F3::set('file_Name', $fileName);
    F3::set('folder', $folder);
    f3::set('message', $message);
    
    echo Template::serve('sample05.htm');