<?php
    //### This sample will show how to add collaborator to doc with annotations
    
    //### Set variables and get POST data
    F3::set('userId', '');
    F3::set('privateKey', '');
    F3::set('fileId', '');
    F3::set('collaborations', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $collaborations = array(F3::get('POST["email"]'));

    function addCollaborator($clientId, $privateKey, $collaborations) {
        // Remove NULL value
        $collaborations = (is_array($collaborations)) ? array_filter($collaborations, 'strlen') : array();

        if (empty($clientId) || empty($privateKey) || (is_array($collaborations) && !count($collaborations))) {
            throw new Exception('Please enter all required parameters');
        } else {
            //Get base path
            $basePath = f3::get('POST["server_type"]');
            $fileGuId = F3::get('POST["fileId"]');
            $url = F3::get('POST["url"]');
            $file = $_FILES['file'];
            F3::set('userId', $clientId);
            F3::set('privateKey', $privateKey);
            F3::set('collaborations', $collaborations);

            //### Create Signer, ApiClient and Annotation Api objects
            // Create signer object
            $signer = new GroupDocsRequestSigner($privateKey);

            // Create apiClient object
            $apiClient = new ApiClient($signer);

            // Create Annotation object
            $ant = new AntApi($apiClient);
              //Create Storage Api object
            $api = new StorageApi($apiClient);
            if ($basePath == "") {
                //If base base is empty seting base path to prod server
                $basePath = 'https://api.groupdocs.com/v2.0';
            }
            //Set base path
            $ant->setBasePath($basePath);
            $api->setBasePath($basePath);
             //Check if user choose upload file from URL
            if ($url != "") {
                $fileGuId = "";
                //Upload file from URL
                $uploadResult = $api->UploadWeb($clientId, $url);
                //Check is file uploaded
                if ($uploadResult->status == "Ok") {
                    //Get file GUID
                    $fileId = $uploadResult->result->guid;
                //If it isn't uploaded throw exception to template
                } else {
                    throw new Exception($uploadResult->error_message);
                }
            }
            //Check is user choose upload local file
            if ($_FILES['file']["name"] != "") {
                $fileGuId = "";
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
                    $fileId = $uploadResult->result->guid;
                //If it isn't uploaded throw exception to template
                } else {
                    throw new Exception($uploadResult->error_message);
                }
            }
            if ($fileGuId != "") {
                $fileId = $fileGuId;
                F3::set('fileId', $fileGuId);
            }
            // Make a request to Annotation API using clientId and fileId
            $response = $ant->SetAnnotationCollaborators($clientId, $fileId, "v2.0", $collaborations);

            // Check the result of the request
            if (isset($response->result)) {
                // If request was successfull - set annotations variable for template
                return F3::set('result', $response->result);
            }
        }
    }

    try {
        addCollaborator($clientId, $privateKey, $collaborations);
    } catch (Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }

    // Process template
    echo Template::serve('sample13.htm');