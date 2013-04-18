<?php

    $userInfo = file(__DIR__ . '/../../user_info.txt');
    $clientId = $userInfo[0];
    $privateKey = $userInfo[1];
    $json = file_get_contents("php://input");
	$callBack_data = json_decode($json, true);
	$jobId = $callBack_data["SourceId"];
	 
    //Create signer object
    $signer = new GroupDocsRequestSigner(trim($privateKey));
    //Create apiClient object
    $apiClient = new APIClient($signer);
    //Create AsyncApi object
    $api = new AsyncApi($apiClient);
    //Create Storage Api object
    $apiStorage = new StorageApi($apiClient);
	sleep(5);
	$jobInfo = $api->GetJobDocuments(trim($clientId), $jobId, "");
	if ($jobInfo->status == "Ok") {
		   //Get file guid
            $guid = $jobInfo->result->inputs[0]->outputs[0]->guid;
            $name = $jobInfo->result->inputs[0]->outputs[0]->name;
			
    }
    $downloadFolder = dirname(__FILE__). '/../../downloads';
    if (!file_exists($downloadFolder)) {
        mkdir($downloadFolder);
    }
    //Obtaining file stream of downloading file and definition of folder where to download file
    $outFileStream =  FileStream::fromHttp($downloadFolder, $name);
    $download = $apiStorage->GetFile(trim($clientId), $guid, $outFileStream);
    
?>