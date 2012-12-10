<?php

    F3::set('userId', '');
    F3::set('privateKey', '');
    F3::set('fileId', '');

    $postdata = file_get_contents("php://input"); // get raw post data


    if (isset($postdata) AND !empty($postdata)) {
        $jsonPostData = json_decode($postdata, true); //get json object from raw data with request parameters

        $clientId = $jsonPostData['userId']; //get parameters from json object
        $privateKey = $jsonPostData['privateKey'];
        $documents = $jsonPostData['documents'];
        $signers = $jsonPostData['signers'];
        for ($i = 0; $i < count($signers); $i++) {
            $signers[$i]['placeSingatureOn'] = '';
        }
        $signer = new GroupDocsRequestSigner($privateKey); //create signer
        $apiClient = new APIClient($signer); //create ApiClient
        $signatureApi = new SignatureApi($apiClient);
        $settings = new SignatureSignDocumentSettings(); // create setting variable for signature SignDocument method
        $settings->documents = $documents;
        $settings->signers = $signers;
        $response = $signatureApi->SignDocument($clientId, $settings);

        if ($response->status == "Ok") {
            $return = json_encode(array("responseCode" => 200, "documentId" => $response->result->documentId));
        }
    }
    if (isset($return) AND !empty($return)) {
        header('Content-type: application/json');
        echo $return;
    } else {
        echo Template::serve('sample6.htm');
    }

