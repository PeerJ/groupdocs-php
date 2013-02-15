<?php
    //<i>This sample will show how to use <b>GuId</b> of file to generate an embedded Viewer URL for a Document</i>

    //###Set variables and get POST data
    F3::set('userId', '');
    F3::set('privateKey', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $fileGuId = f3::get('POST["fileId"]');
   
    function getPageImages($fileGuId, $clientId, $privateKey)
    {
        //###Check fileGuId
        if (empty($fileGuId) || empty($clientId) || empty($privateKey)) {
            throw new Exception('Please enter FILE ID');
        } else {
           
            F3::set('userId', $clientId);
            F3::set('privateKey', $privateKey);
            //###Create Signer, ApiClient and Storage Api objects

            //Create signer object
            $signer = new GroupDocsRequestSigner($privateKey);
            //Create apiClient object
            $apiClient = new APIClient($signer);
            //Create Storage Api object
            $api = new DocApi($apiClient);
            $api->setBasePath("https://stage-api.groupdocs.com/v2.0");
            $pageImage = $api->ViewDocument($clientId, $fileGuId, 0, -1);
            if($pageImage->status == "Ok") {
                              
                //Generation of iframe URL using fileGuId
                $iframe = 'https://stage-apps.groupdocs.com/document-viewer/embed/' . $pageImage->result->guid . '?frameborder="0" width="500" height="650"';
                //If request was successfull - set url variable for template
            }
            return f3::set('url', $iframe);
        }
    }
    
    try {
        getPageImages($fileGuId, $clientId, $privateKey);
    } catch(Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }
    //Process template
     
    f3::set('fileId', $fileGuId);
    echo Template::serve('sample23.htm');