<?php
    //### This sample will show how to insert Assembly questionary into webpage using PHP SDK
     
    //### Set variables and get POST data
    F3::set('userId', '');
    F3::set('privateKey', '');
    F3::set('fileId', '');
    F3::set('convert_type', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $fileId = F3::get('POST["fileId"]');
    $convert_type = F3::get('POST["convert_type"]');

    function Convert($clientId, $privateKey, $fileId, $convert_type) {
        if (empty($fileId)|| empty($privateKey) || empty($fileId) || empty($convert_type)) {
            throw new Exception('Please enter all required parameters');
        } else {
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
            //Create AsyncApi object
            $api = new AsyncApi($apiClient);
            if ($basePath == "") {
                //If base base is empty seting base path to prod server
                $basePath = 'https://api.groupdocs.com/v2.0';
            }
            //Set base path
            $api->setBasePath($basePath);
            //Make request to api for convert file
            $convert = $api->Convert($clientId, $fileId, null, null, null, null, $convert_type);
            //Check request status
            if($convert->status == "Ok") {
                //Delay necessary that the inquiry would manage to be processed
                sleep(5);
                //Make request to api for get document info by job id
                $jobInfo = $api->GetJobDocuments($clientId, $convert->result->job_id, "");
                if ($jobInfo->result->inputs[0]->outputs[0]->guid != "") {
                    //Get file guid
                    $guid = $jobInfo->result->inputs[0]->outputs[0]->guid;
                } else {
                    throw new Exception('File GuId is empty');
                }
                //Generation of iframe URL using fileGuId
                if($basePath == "https://api.groupdocs.com/v2.0") {
                   $iframe = 'http://apps.groupdocs.com/document-viewer/embed/' . $guid . '" frameborder="0" width="100%" height="600"></iframe>';
               //iframe to dev server
               } elseif($basePath == "https://dev-api.groupdocs.com/v2.0") {
                   $iframe = 'http://dev-apps.groupdocs.com/document-viewer/embed/' . $guid . '" frameborder="0" width="100%" height="600"></iframe>';
               //iframe to test server
               } elseif($basePath == "https://stage-api.groupdocs.com/v2.0") {
                   $iframe = 'http://stage-apps.groupdocs.com/document-viewer/embed/' . $guid . '" frameborder="0" width="100%" height="600"></iframe>';
               //Iframe to realtime server
               } elseif ($basePath == "http://realtime-api.groupdocs.com") {
                   $iframe = 'http://realtime-apps.groupdocs.com/document-viewer/embed/' . $guid . '" frameborder="0" width="100%" height="600"></iframe>';
               }

            } else {
                $error_message = $convert->error_message;
                return f3::set('error_message', $error_message);
            }
            //If request was successfull - set url variable for template
            return F3::set('iframe', $iframe);
        }
    }

    try {
        Convert($clientId, $privateKey, $fileId, $convert_type);
    } catch (Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }
    F3::set('userId', $clientId);
    F3::set('privateKey', $privateKey);
    F3::set('fileId', $fileId);
    F3::set('convert_type', $convert_type);
    // Process template
    echo Template::serve('sample18.htm');