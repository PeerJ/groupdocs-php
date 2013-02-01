<?php
    //<i>This sample will show how to use <b>GetDocumentPagesImageUrls</b> method from Doc Api to return a URL representing a single page of a Document</i>

    //###Set variables and get POST data
    F3::set('userId', '');
    F3::set('privateKey', '');
    f3::set('result', "");
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $sourceFileId = f3::get('POST["sourceFileId"]');
    $targetFileId = f3::get('POST["targetFileId"]');
    $callbackUrl = f3::get('POST["callbackUrl"]');
       
    function Compare($clientId, $privateKey, $sourceFileId, $targetFileId, $callbackUrl)
    {
         //### Check clientId, privateKey and fileGuId
        if (empty($clientId) || empty($privateKey) || empty($sourceFileId) || empty($targetFileId)) {
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
            //Create ComparisonApi object
            $CompareApi = new ComparisonApi($apiClient);

            //###Make request to ComparisonApi using user id
            //Compare documents
            $info = $CompareApi->Compare($clientId, $sourceFileId, $targetFileId, $callbackUrl);
            //Check request status
            if($info->status == "Ok") {
                //Create CAsyncApi object
                $asyncApi = new AsyncApi($apiClient);
                //Delay necessary that the inquiry would manage to be processed
                sleep(5);
                //Make request to api for get document info by job id
                $jobInfo = $asyncApi->GetJobDocuments($clientId, $info->result->job_id);
                //Get file guid
                $guid = $jobInfo->result->outputs[0]->guid;
                // Construct iframe using fileId
                $iframe = '<iframe src="https://apps.groupdocs.com/document-viewer/embed/' . $guid . '" frameborder="0" width="100%" height="600"></iframe>';

            }
            //If request was successfull - set url variable for template
            return F3::set('iframe', $iframe);
        }
    }
    
    try {
         Compare($clientId, $privateKey, $sourceFileId, $targetFileId, $callbackUrl);
        
    } catch(Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }
    //Process template
    f3::set('sourceFileId', $sourceFileId);
    f3::set('targetFileId', $targetFileId);
    f3::set('callbackURL', $callbackUrl);
//    f3::set('result', $result);
    echo Template::serve('sample19.htm');