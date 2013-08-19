<?php
    //### This sample will show how to insert Assembly questionary into webpage using PHP SDK
     
    //### Set variables and get POST data
    F3::set('userId', '');
    F3::set('privateKey', '');
    F3::set('fileId', '');
    F3::set('convert_type', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $convert_type = F3::get('POST["convert_type"]');

    function convert($clientId, $privateKey, $convert_type) {
        if (empty($clientId)|| empty($privateKey) || empty($convert_type)) {
            throw new Exception('Please enter all required parameters');
        } else {
            //path to settings file - temporary save userId and apiKey like to property file
            $infoFile = fopen(__DIR__ . '/../user_info.txt', 'w');
            fwrite($infoFile, $clientId . "\r\n" . $privateKey);        
            fclose($infoFile);
             //check if Downloads folder exists and remove it to clean all old files
            if (file_exists(__DIR__ . '/../downloads')) {
                delFolder(__DIR__ . '/../downloads/');
            } 
            //Get base path
            $basePath = f3::get('POST["server_type"]');
             //Set variables for Viewer
            F3::set('userId', $clientId);
            F3::set('privateKey', $privateKey);
            //Get entered by user data
            $url = F3::get('POST["url"]');
            $file = $_FILES['file'];
            $fileId = f3::get('POST["fileId"]');
            //###Create Signer, ApiClient and Storage Api objects
            //Create signer object
            $signer = new GroupDocsRequestSigner($privateKey);
            //Create apiClient object
            $apiClient = new APIClient($signer);
            //Create AsyncApi object
            $asyncApi = new AsyncApi($apiClient);
            //Create Storage Api object
            $apiStorage = new StorageApi($apiClient);
            if ($basePath == "") {
                //If base base is empty seting base path to prod server
                $basePath = 'https://api.groupdocs.com/v2.0';
            }
            //Set base path
            $asyncApi->setBasePath($basePath);
            $apiStorage->setBasePath($basePath);
            //Check if user choose upload file from URL
            if ($url != "") {
                //Upload file from URL
                $uploadResult = $apiStorage->UploadWeb($clientId, $url);
                //Check is file uploaded
                if ($uploadResult->status == "Ok") {
                    //Get file GUID
                    $fileGuId = $uploadResult->result->guid;
                    $fileId = "";
                //If it isn't uploaded throw exception to template
                } else {
                    throw new Exception($uploadResult->error_message);
                }
            }
            //Check is user choose upload local file
            if ($_FILES['file']["name"] != "") {
                //Temp name of the file
                $tmp_name = $file['tmp_name']; 
                //Original name of the file
                $name = $file['name'];
                //Creat file stream
                $fs = FileStream::fromFile($tmp_name);
                //###Make a request to Storage API using clientId
                //Upload file to current user storage
                $uploadResult = $apiStorage->Upload($clientId, $name, 'uploaded', "", $fs);
                //###Check if file uploaded successfully
                if ($uploadResult->status == "Ok") {
                    //Get file GUID
                    $fileGuId = $uploadResult->result->guid;
                    $fileId = "";
                //If it isn't uploaded throw exception to template
                } else {
                    throw new Exception($uploadResult->error_message);
                }
            }
            //Check is user choose file GUID
            if ($fileId != "") {
                //Get entered by user file GUID
                $fileGuId = $fileId;
            }
            $callbackUrl = f3::get('POST["callbackUrl"]');
            F3::set("callbackUrl", $callbackUrl);
            //Make request to api for convert file
            $convert = $asyncApi->Convert($clientId, $fileGuId, null, null, null, $callbackUrl, $convert_type);
            //Check request status
            if($convert->status == "Ok") {
                //Delay necessary that the inquiry would manage to be processed
                sleep(5);
                //Make request to api for get document info by job id
                $jobInfo = $asyncApi->GetJobDocuments($clientId, $convert->result->job_id, "");
				
                if ($jobInfo->result->inputs[0]->outputs[0]->guid != "") {
                    //Get file guid
                    $guid = $jobInfo->result->inputs[0]->outputs[0]->guid;
                } else {
                    throw new Exception('File GuId is empty');
                }
                //Generation of iframe URL using fileGuId
                if($basePath == "https://api.groupdocs.com/v2.0") {
                   $iframe = 'http://apps.groupdocs.com/document-viewer/embed/' . 
                           $guid . '" frameborder="0" width="100%" height="600"';
               //iframe to dev server
               } elseif($basePath == "https://dev-api.groupdocs.com/v2.0") {
                   $iframe = 'http://dev-apps.groupdocs.com/document-viewer/embed/' . 
                           $guid . '" frameborder="0" width="100%" height="600"';
               //iframe to test server
               } elseif($basePath == "https://stage-api.groupdocs.com/v2.0") {
                   $iframe = 'http://stage-apps.groupdocs.com/document-viewer/embed/' . 
                           $guid . '" frameborder="0" width="100%" height="600"';
               //Iframe to realtime server
               } elseif ($basePath == "http://realtime-api.groupdocs.com") {
                   $iframe = 'http://realtime-apps.groupdocs.com/document-viewer/embed/' .
                           $guid . '" frameborder="0" width="100%" height="600"';
               }

            } else {
                $error_message = $convert->error_message;
                return f3::set('error_message', $error_message);
            }
            //If request was successfull - set url variable for template
            F3::set('fileId', $fileId);
            return F3::set('iframe', $iframe);
        }
    }
    //### Delete downloads folder and all files in this folder
    function delFolder($path) {
        $next = null;
        $item = array();
        //Get all items fron folder
        $item = scandir($path);
        //Remove from array "." and ".."
        $item = array_slice($item, 2);
        //Check is there was files
        if (count($item) > 0) {
            //Delete files from folder
            for ($i = 0; $i < count($item); $i++) {
                $next = $path . "\\" . $item[$i];
                if (file_exists($next)) {
                    unlink($next);
                }
            }
        }
        //Delete folder
        rmdir($path);
    }

    try {
        convert($clientId, $privateKey, $convert_type);
    } catch (Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }
    F3::set('userId', $clientId);
    F3::set('privateKey', $privateKey);
    F3::set('convert_type', $convert_type);
    // Process template
    echo Template::serve('sample18.htm');