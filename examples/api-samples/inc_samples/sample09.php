<?php
    //<i>This sample will show how to use <b>GuId</b> of file to generate an embedded Viewer URL for a Document</i>

    //###Set variables and get POST data
    F3::set('userId', '');
    F3::set('privateKey', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $width = f3::get('POST["width"]');
    $height = f3::get('POST["height"]');
    
    function Iframe($clientId, $privateKey, $width='400', $height='650')
    {
        //###Check fileGuId
        if (empty($clientId) || empty($privateKey)) {
            throw new Exception('Please enter all required parameters');
        } else {
            F3::set('userId', $clientId);
            F3::set('privateKey', $privateKey);
            //Get base path
            $basePath = f3::get('POST["server_type"]');
            $fileGuId = "";
            $url = F3::get('POST["url"]');
            $file = $_FILES['file'];
            $fileId = f3::get('POST["fileId"]');
             //###Create Signer, ApiClient and Storage Api objects

            //Create signer object
            $signer = new GroupDocsRequestSigner($privateKey);
            //Create apiClient object
            $apiClient = new APIClient($signer);
            //Create Storage Api object
            $api = new StorageApi($apiClient);
            //Check is user entered base path
            if ($basePath == "") {
                //If base base is empty seting base path to prod server
                $basePath = 'https://api.groupdocs.com/v2.0';
            }
            //Set base path
            $api->setBasePath($basePath);
            //Check if user choose upload file from URL
            if ($url != "") {
                //Upload file from URL
                $uploadResult = $api->UploadWeb($clientId, $url);
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
            //Generation of iframe URL using fileGuId
             if($basePath == "https://api.groupdocs.com/v2.0") {
                $iframe = 'http://apps.groupdocs.com/document-viewer/embed/' . $fileGuId . '?frameborder="0" width="450" height="650"';
            //iframe to dev server
            } elseif($basePath == "https://dev-api.groupdocs.com/v2.0") {
                $iframe = 'http://dev-apps.groupdocs.com/document-viewer/embed/' . $fileGuId . '?frameborder="0" width="450" height="650"';
            //iframe to test server
            } elseif($basePath == "https://stage-api.groupdocs.com/v2.0") {
                $iframe = 'http://stage-apps.groupdocs.com/document-viewer/embed/' . $fileGuId . '?frameborder="0" width="450" height="650"';
            //Iframe to realtime server
            } elseif ($basePath == "http://realtime-api.groupdocs.com") {
                $iframe = 'http://realtime-apps.groupdocs.com/document-viewer/embed/' . $fileGuId . '?frameborder="0" width="450" height="650"';
            }
            //If request was successfull - set url variable for template
            f3::set('fileId', $fileGuId);
            return f3::set('url', $iframe);
        }
    }
    
    try {
        Iframe($clientId, $privateKey, $width, $height);
    } catch(Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }
    //Process template
    F3::set('userId', $clientId);
    F3::set('privateKey', $privateKey);
    F3::set('width', $width);
    F3::set('height', $height);
    
    echo Template::serve('sample09.htm');