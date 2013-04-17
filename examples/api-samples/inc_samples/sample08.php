<?php
    //<i>This sample will show how to use <b>GetDocumentPagesImageUrls</b> method from Doc Api to return a URL representing a single page of a Document</i>

    //###Set variables and get POST data
    F3::set('userId', '');
    F3::set('privateKey', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $pageNumber = f3::get('POST["pageNumber"]');
    
    function GetDocumentPages($clientId, $privateKey, $pageNumber=0)
    {
         //### Check clientId, privateKey and fileGuId
        if (empty($clientId) || empty($privateKey)) {
            throw new Exception('Please enter all required parameters');
        } else {
            //Get entered by user data
            $fileGuId = "";
            $url = F3::get('POST["url"]');
            $file = $_FILES['file'];
            $fileId = f3::get('POST["fileId"]');
            //Get base path
            $basePath = f3::get('POST["server_type"]');
            //Set variables for Viewer
            F3::set('userId', $clientId);
            F3::set('privateKey', $privateKey);
            //###Create Signer, ApiClient and Storage Api objects

            //Create signer object
            $signer = new GroupDocsRequestSigner($privateKey);
            //Create apiClient object
            $apiClient = new APIClient($signer);
            //Create DocApi object
            $docApi = new DocApi($apiClient);
            //Create Storage Api object
            $api = new StorageApi($apiClient);
            //Check is user entered base path
            if ($basePath == "") {
                //If base base is empty seting base path to prod server
                $basePath = 'https://api.groupdocs.com/v2.0';
            }
            //Set base path
            $docApi->setBasePath($basePath);
            $api->setBasePath($basePath);
            //Check if user choose upload file from URL
            if ($url != "") {
                //Upload file from URL
                $uploadResult = $api->UploadWeb($clientId, $url);
                //Check is file uploaded
                if ($uploadResult->status == "Ok") {
                    //Get file GUID
                    $fileGuId = $uploadResult->result->guid;
                    $file = "";
                    $fileId = "";
                //If it isn't uploaded throw exception to template
                } else {
                    throw new Exception($uploadResult->error_message);
                }
            }
            //Check is user choose upload local file
            if ($_FILES['file']["name"] != "") {
                //Get uploaded file
                $uploadedFile = $_FILES['file'];
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
            //###Make request to DocApi using user id
            
            //Obtaining URl of entered page 
            $URL = $docApi->GetDocumentPagesImageUrls($clientId, $fileGuId, (int)$pageNumber, 1, "500x600");
            //If request was successfull - set url variable for template
            f3::set('fileId', $fileGuId);
            return f3::set('url', $URL->result->url[0]);
        }
    }
    
    try {
        GetDocumentPages($clientId, $privateKey, $pageNumber);
    } catch(Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }
    //Process template
    f3::set('pageNumber', $pageNumber);
    echo Template::serve('sample08.htm');