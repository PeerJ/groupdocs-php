<?php

    $userInfo = file(__DIR__ . '/../../user_info.txt');
    $clientId = $userInfo[0];
    $privateKey = $userInfo[1];
    $json = file_get_contents("php://input");
    $callBack_data = json_decode($json);
    $jobId = $callBack_data["SourceId"];
    //Create signer object
    $signer = new GroupDocsRequestSigner($privateKey);
    //Create apiClient object
    $apiClient = new APIClient($signer);
    //Create AsyncApi object
    $api = new AsyncApi($apiClient);
    //Create Storage Api object
    $apiStorage = new StorageApi($apiClient);
    $jobInfo = $api->GetJobDocuments($clientId, $jobId, "");
        if ($jobInfo->status == "Ok") {
            //Get file guid
            $guid = $jobInfo->result->inputs[0]->outputs[0]->guid;
            $name = $jobInfo->result->inputs[0]->outputs[0]->name;
        } else {
            throw new Exception($jobInfo->error_message);
        }
    $downloadFolder = __DIR__ . '/../../downloads';
    if (!file_exists($downloadFolder)) {
        mkdir($downloadFolder);
    }
    //Obtaining file stream of downloading file and definition of folder where to download file
    $outFileStream =  FileStream::fromHttp($downloadFolder, $name);
    $download = $apiStorage->GetFile($clientId, $guid, $outFileStream);
    
?>
