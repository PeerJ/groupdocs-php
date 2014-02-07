<?php

//Local path to the text file with user data
$userInfo = file(__DIR__ . '/../../user_info.txt');
//Get user data from text file
$clientId = trim($userInfo[0]);
$privateKey = trim($userInfo[1]);
//Get raw data
$json = file_get_contents("php://input");
//path to settings file - temporary save userId and apiKey like to property file
//Decode json with raw data to array
$callBack_data = json_decode($json, true);
//Get job id from array
$envelopeId = $callBack_data["SourceId"];
$jobStatus = $callBack_data["EventType"];
if ($jobStatus == "JobCompleted") {
    //Create signer object
    $signer = new GroupDocsRequestSigner(trim($privateKey));
    //Create apiClient object
    $apiClient = new APIClient($signer);
    //Create AsyncApi object
    $signatureApi = new SignatureApi($apiClient);
    //Create Storage Api object
    $storageApi = new StorageApi($apiClient);
    $getDocInfo = $signatureApi->GetSignatureEnvelopeDocuments($clientId, $envelopeId);
    if ($getDocInfo->status == "Ok") {
        if ($getSignDocument->result->documents[0]->status == "Completed") {
            //Get file GUID
            $guid = $getSignDocument->result->documents[0]->documentId;
            $result = array('guid' => $guid);
            //Decode array to json and return json string to ajax request
            echo json_encode($result);
        }
    }
}