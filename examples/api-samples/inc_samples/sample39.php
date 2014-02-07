<?php

//###<i>This sample will show how to add a Signature to a document and redirect after signing with GroupDocs widget</i>

//Get all data from ajax
$postdata = file_get_contents("php://input");
//Check if data from ajax not empty
if (!empty($postdata)) {
    $error = null;
    //Decode ajax data
    $json_post_data = json_decode($postdata, true);
    //Get Client ID
    $clientId = $json_post_data['userId'];
    //Get Private Key
    $privateKey = $json_post_data['privateKey'];
    //Get document for sign
    $documents = $json_post_data['documents'];
    //Get signature file
    $signers = $json_post_data['signers'];
    //Inable signature parameter for the signature object
    for ($i = 0; $i < count($signers); $i++) {
        $signers[$i]['placeSignatureOn'] = '';
    }
    //Create signer object
    $signer = new GroupDocsRequestSigner($privateKey);
    //Create Api Client object
    $apiClient = new APIClient($signer);
    //Create Signature Api object
    $signatureApi = new SignatureApi($apiClient);
    //Create object of sign ssettings
    $settings = new SignatureSignDocumentSettingsInfo();
    //Set document for signing
    $settings->documents = $documents;
    //Set signature
    $settings->signers = $signers;
    //Make request to sign documnet
    $signDocument = $signatureApi->SignDocument($clientId, $settings);
    //Check request status
    if ($signDocument->status == "Ok") {
        //Get signed document GUID
        for ($i = 0; $i < 5; $i++) {
            //Check status of documnet is it signed
            $getSignDocument = $signatureApi->GetSignDocumentStatus($clientId, $signDocument->result->jobId);
            if ($getSignDocument->status == "Ok") {
                if ($getSignDocument->result->documents[0]->status == "Completed") {
                    //Get file GUID
                    $guid = $getSignDocument->result->documents[0]->documentId;
                    break;
                } else {
                    //Wait while server processed data
                    sleep(3);
                }
            } else {
                $error = $getSignDocument->error_message;
            }
        }
    } else {
        $error = $signDocument->error_message;
    }
    //Create array with result data
    $result = array('guid' => $guid,
        'clientId' => $clientId,
        'privateKey' => $privateKey,
        'error' => $error);
    //Decode array to json and return json string to ajax request
    echo json_encode($result);
} else {
    echo Template::serve('sample39.htm');
}