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
           
             //Set variables for Viewer
            F3::set('userId', $clientId);
            F3::set('privateKey', $privateKey);
            //###Create Signer, ApiClient and Storage Api objects

            //Create signer object
            $signer = new GroupDocsRequestSigner($privateKey);
            //Create apiClient object
            $apiClient = new APIClient($signer);
            $api = new AsyncApi($apiClient);
            $convert = $api->Convert($clientId, $fileId, $convert_type, null, null, null, null, null);
            
            if($convert->status == "Ok") {
                sleep(5);
                $jobInfo = $api->GetJobDocuments($clientId, $convert->result->job_id);
                
                if($jobInfo->result->inputs[0]->outputs[0]->guid != "") {
                    // Construct iframe using fileId
                    $guid = $jobInfo->result->inputs[0]->outputs[0]->guid;
                    $iframe = '<iframe src="https://apps.groupdocs.com/document-viewer/embed/' . $guid . '" frameborder="0" width="100%" height="600"></iframe>';

                }
            }
            
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