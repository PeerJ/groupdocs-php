<?php
    //<i>This sample will show how to use <b>GuId</b> of file to generate an embedded Viewer URL for a Document</i>

    //###Set variables and get POST data
    F3::set('userId', '');
    F3::set('privateKey', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $basePath = f3::get('POST["server_type"]');
   
    function Iframe($clientId, $privateKey, $basePath)
    {
        //###Check if user entered all parameters
        if (empty($clientId) || empty($privateKey)) {
            throw new Exception('Please enter FILE ID');
        } else {
            F3::set('userId', $clientId);
            F3::set('privateKey', $privateKey);
            //###Create Signer, ApiClient and Storage Api objects

            //Create signer object
            $signer = new GroupDocsRequestSigner($privateKey);
            //Create apiClient object
            $apiClient = new APIClient($signer);
            //Create Doc Api object
            $api = new DocApi($apiClient);
            //Create Storage Api object
            $apiStorage = new StorageApi($apiClient);
            //Set url to choose whot server to use
            if ($basePath == "") {
                //If base base is empty seting base path to prod server
                $basePath = 'https://api.groupdocs.com/v2.0';
            }
            //Set base path
            $api->setBasePath($basePath);
            $apiStorage->setBasePath($basePath);
            //Get entered by user data
            $url = F3::get('POST["url"]');
            $file = $_FILES['file'];
            $fileId = f3::get('POST["fileId"]');
            $fileGuId = "";
            //Check is file GUID entered
            if ($fileId != "") {
                $fileGuId = $fileId;
            }
            //If user choose upload file from URL
            if ($url != "") {
                //Upload file from URL
                $uploadResult = $apiStorage->UploadWeb($clientId, $url);
                //Check is file uploaded
                if ($uploadResult->status == "Ok") {
                    //Get file GUID
                    $fileGuId = $uploadResult->result->guid;
                    
                //If it isn't uploaded throw exception to template
                } else {
                    throw new Exception($uploadResult->error_message);
                }
            }
            //If user choose upload local file
            if ($file["name"] != "") {
                //Get uploaded file
                $uploadedFile = $_FILES['file'];
              

                //###Check uploaded file
                if (null === $uploadedFile) {
                    return new RedirectResponse("/sample21");
                }
                //Temp name of the file
                $tmp_name = $uploadedFile['tmp_name']; 
                //Original name of the file
                $name = $uploadedFile['name'];
                //Creat file stream
                $fs = FileStream::fromFile($tmp_name);


                //###Make a request to Storage API using clientId

                //Upload file to current user storage
                $uploadResult = $apiStorage->Upload($clientId, $name, 'uploaded', "", $fs);
                //###Check if file uploaded successfully
                if ($uploadResult->status == "Ok") {
                    $fileGuId = $uploadResult->result->guid;
                   
                } else {
                    throw new Exception($uploadResult->error_message);
                }
            }
            //Make request yo the Api to get images for all document pages
            $pageImage = $api->ViewDocument($clientId, $fileGuId, 0, -1, 100, null);
            //Check the result of the request
            if($pageImage->status == "Ok") {
                 //### If request was successfull
               
                //Generation of iframe URL using $pageImage->result->guid
                //iframe to prodaction server
                if($basePath == "https://api.groupdocs.com/v2.0") {
                    $iframe = 'https://apps.groupdocs.com/document-viewer/embed/' . $pageImage->result->guid . '?frameborder="0" width="500" height="650"';
                //iframe to dev server
                } elseif($basePath == "https://dev-api.groupdocs.com/v2.0") {
                    $iframe = 'https://dev-apps.groupdocs.com/document-viewer/embed/' . $pageImage->result->guid . '?frameborder="0" width="500" height="650"';
                //iframe to test server
                } elseif($basePath == "https://stage-api.groupdocs.com/v2.0") {
                    $iframe = 'https://stage-apps.groupdocs.com/document-viewer/embed/' . $pageImage->result->guid . '?frameborder="0" width="500" height="650"';
                } elseif ($basePath == "http://realtime-api.groupdocs.com") {
                    $iframe = 'http://realtime-apps.groupdocs.com/document-viewer/embed/' . $pageImage->result->guid . '?frameborder="0" width="500" height="650"';
                }
                
            } else {
                throw new Exception($pageImage->error_message);
            }
            //Set variable with results for template
            f3::set('fileId', $fileGuId);
            return f3::set('url', $iframe);
        }
    }
    
    try {
        Iframe($clientId, $privateKey, $basePath);
    } catch(Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }
    //Process template
    echo Template::serve('sample23.htm');