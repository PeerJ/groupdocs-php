<?php
    //<i>This sample will show how to use <b>Compare</b> method from ComparisonApi to return a URL representing a single page of a Document</i>

    //###Set variables and get POST data
    F3::set('userId', '');
    F3::set('privateKey', '');
    f3::set('result', "");
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $sourceFileId = f3::get('POST["sourceFileId"]');
    $targetFileId = f3::get('POST["targetFileId"]');
    $callbackUrl = f3::get('POST["callbackUrl"]');
    $basePath = f3::get('POST["server_type"]');
       
    function Compare($clientId, $privateKey, $sourceFileId, $targetFileId, $callbackUrl, $basePath)
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
            if ($basePath == "") {
                //If base base is empty seting base path to prod server
                $basePath = 'https://api.groupdocs.com/v2.0';
            }
            //Set base path
            $CompareApi->setBasePath($basePath);
            
            //###Make request to ComparisonApi using user id
            
            //Comparison of documents where: $clientId - user GuId, $sourceFileId - source file Guid in which will be provided compare, 
            //$targetFileId - file GuId with wich will compare sourceFile, $callbackUrl - Url which will be executed after compare,
            
            $info = $CompareApi->Compare($clientId, $sourceFileId, $targetFileId, $callbackUrl);
            //###Example of handling callback request:
            //  You can handle callback request in separate php file or in the same one. Our service will post JSON data via post request. 
            //In PHP you should get raw data like this:
            //     $json = file_get_contents("php://input"); - get callback data
            //     $fp = fopen(__DIR__ . '/../../temp/signature_request_log.txt', 'a'); - open file for data write
            //     fwrite($fp, $json . "\r\n"); - write data to the file
            //     fclose($fp); - close file
            
            //Check request status
            if($info->status == "Ok") {
                //Create AsyncApi object
                $asyncApi = new AsyncApi($apiClient);
                $asyncApi->setBasePath($basePath);
                //### Check job status
                                
                for ($i = 0; $i <= 5; $i++) {
                    //Delay necessary that the inquiry would manage to be processed
                    sleep(5);                    
                    //Make request to api for get document info by job id
                    $jobInfo = $asyncApi->GetJobDocuments($clientId, $info->result->job_id);
                    //Check job status, if status is Completed or Archived exit from cycle
                    if ($jobInfo->result->job_status == "Completed" || $jobInfo->result->job_status == "Archived") {
                        break;
                    //If job status Postponed throw exception with error
                    } elseif ($jobInfo->result->job_status == "Postponed") {
                        throw new Exception('Job is failure');
                    }
                    
                }
                //Get file guid
                $guid = $jobInfo->result->outputs[0]->guid;
                // Construct iframe using fileId
                if($basePath == "https://api.groupdocs.com/v2.0") {
                    $iframe = 'https://apps.groupdocs.com/document-viewer/embed/' . $guid . ' frameborder="0" width="500" height="650"';
                //iframe to dev server
                } elseif($basePath == "https://dev-api.groupdocs.com/v2.0") {
                    $iframe = 'https://dev-apps.groupdocs.com/document-viewer/embed/' . $guid . ' frameborder="0" width="500" height="650"';
                //iframe to test server
                } elseif($basePath == "https://stage-api.groupdocs.com/v2.0") {
                    $iframe = 'https://stage-apps.groupdocs.com/document-viewer/embed/' . $guid . ' frameborder="0" width="500" height="650"';
                } elseif ($basePath == "http://realtime-api.groupdocs.com") {
                   $iframe = 'http://realtime-apps.groupdocs.com/document-viewer/embed/' . $guid . '" frameborder="0" width="100%" height="600"></iframe>';
               }

            }
            //If request was successfull - set url variable for template
            return F3::set('iframe', $iframe);
        }
    }
    
    try {
         Compare($clientId, $privateKey, $sourceFileId, $targetFileId, $callbackUrl, $basePath);
        
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