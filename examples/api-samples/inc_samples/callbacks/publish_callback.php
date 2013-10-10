<?php

//Local path to the text file with user data
$userInfo = file(__DIR__ . '/../../user_info.txt');
//Get user data from text file
$clientId = trim($userInfo[0]);
$privateKey = trim($userInfo[1]);
//Get raw data
$json = file_get_contents("php://input");

//Decode json with raw data to array
$callBack_data = json_decode($json, true);

//Get job id from array
$formId = $callBack_data["SourceId"];
//Create signer object
$signer = new GroupDocsRequestSigner(trim($privateKey));
//Create apiClient object
$apiClient = new APIClient($signer);
//Create AsyncApi object
$signatureApi = new SignatureApi($apiClient);
$getDocument = $signatureApi->GetSignatureFormDocuments($clientId, $formId);
$documentName = $getDocument->result->documents->name;
$to = "asup07@rambler.ru";

$subject = "Reminder: An envelope has to be signed on GroupDocs";

$message = '
	<html>
		<head>
			<title>Sign form notification</title>
		</head>
		<body>
			<p>Document' . $documentName . ' is signed</p>
		</body>
	</html>';

$headers = "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From: Remainder <noreply@groupdocs.com>\r\n";

mail($to, $subject, $message, $headers);
