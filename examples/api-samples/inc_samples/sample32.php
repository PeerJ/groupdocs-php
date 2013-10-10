<?php

//<i>This sample will show how to dinamically create your own questionary using forms and build signature form from the result document using PHP SDK</i>
//###Set variables and get POST data
F3::set('userId', '');
F3::set('privateKey', '');
$clientId = F3::get('POST["client_id"]');
$privateKey = F3::get('POST["private_key"]');
$basePath = f3::get('POST["server_type"]');
$callbackUrl = f3::get('POST["callbackUrl"]');
$templateGuid = F3::get('POST["template_guid"]');
$error = null;
if (empty($clientId) || empty($privateKey) || empty($templateGuid)) {
    $error = 'Please enter all parameters';
    f3::set('error', $error);
} else {
    //path to settings file - temporary save userId and apiKey like to property file
    $infoFile = fopen(__DIR__ . '/../user_info.txt', 'w');
    fwrite($infoFile, $clientId . "\r\n" . $privateKey);
    fclose($infoFile);
    F3::set('userId', $clientId);
    F3::set('privateKey', $privateKey);
    //###Create Signer, ApiClient and Storage Api objects
    //Create signer object
    $signer = new GroupDocsRequestSigner($privateKey);
    //Create apiClient object
    $apiClient = new APIClient($signer);
    $signatureApi = new SignatureApi($apiClient);
    //Set url to choose whot server to use
    if ($basePath == "") {
        //If base base is empty seting base path to prod server
        $basePath = 'https://api.groupdocs.com/v2.0';
    }
    //Set base path
    $signatureApi->setBasePath($basePath);
    if (empty($callbackUrl)) {
        $callbackUrl = "";
    }
    //Set variables for template       
    f3::set("callbackUrl", $callbackUrl);
    //Create WebHook object
    $webHook = new WebhookInfo();
    //Set callback url of webhook which will be triggered when form is signed.
    $webHook->callbackUrl = $callbackUrl;
    //Create Signature form settings object
    $formSettings = new SignatureFormSettingsInfo();
    //To send notification email to owner when form is signed set notifyOwnerOnSign property to true
    $formSettings->notifyOwnerOnSign = true;
    //Generate rendon form name
    $formName = "test form" . rand(0, 500);
    try {
        //Create signature form
        $createForm = $signatureApi->CreateSignatureForm($clientId, $formName, null, null, null, $formSettings);
        //Check status
        if ($createForm->status == "Ok") {
            try {
                //Set variable for template
                F3::set("tempalte_guid", $createForm->result->form->id);
                //Add document to the form using entered by user file GUID
                $addDocument = $signatureApi->AddSignatureFormDocument($clientId, $createForm->result->form->id, $templateGuid);
                //Sheck status of adding
                if ($addDocument->status == "Ok") {
                    //Post created form
                    try {
                        //Create signature fiekd object with all parameters of it
                        $fieldInfo = new SignatureFormFieldSettingsInfo();
                        $fieldInfo->locationX = 0.2;
                        $fieldInfo->locationY = 0.1;
                        $fieldInfo->locationHeight = 150;
                        $fieldInfo->locationWidth = 350;
                        $fieldInfo->page = 1;
                        $fieldInfo->forceNewField = true;
                        $fieldInfo->name = "field" . rand(0, 1000);
                        //Add created signature field to the form
                        $addField = $signatureApi->AddSignatureFormField($clientId, $createForm->result->form->id, $addDocument->result->document->documentGuid, "0545e589fb3e27c9bb7a1f59d0e3fcb9", $fieldInfo);
                        //Check atatus
                        if ($addField->status == "Ok") {
                            try {
                                //Publish form
                                $postForm = $signatureApi->PublishSignatureForm($clientId, $createForm->result->form->id, $webHook);
                                //Check status
                                if ($postForm->status == "Ok") {
                                    $result = "Form is posted successfully";
                                    F3::set("message", $result);
                                    //Generate iframe url
                                    if ($basePath == "https://api.groupdocs.com/v2.0") {
                                        $iframe = 'https://apps.groupdocs.com/signature2/forms/signembed/' . $createForm->result->form->id;
                                        //iframe to dev server
                                    } elseif ($basePath == "https://dev-api.groupdocs.com/v2.0") {
                                        $iframe = 'https://dev-apps.groupdocs.com/signature2/forms/signembed/' . $createForm->result->form->id;
                                        //iframe to test server
                                    } elseif ($basePath == "https://stage-apps-groupdocs.dynabic.com/v2.0") {
                                        $iframe = 'https://stage-apps-groupdocs.dynabic.com/signature2/forms/signembed/' . $createForm->result->form->id;
                                    } elseif ($basePath == "http://realtime-api.groupdocs.com") {
                                        $iframe = 'https://relatime-apps.groupdocs.com/signature2/forms/signembed/' . $createForm->result->form->id;
                                    }
                                    f3::set('url', $iframe);
                                } else {
                                    throw new Exception($postForm->error_message);
                                }
                            } catch (Exception $e) {
                                $error = 'ERROR: ' . $e->getMessage() . "\n";
                                f3::set('error', $error);
                            }
                        } else {
                            throw new Exception($addField->error_message);
                        }
                    } catch (Exception $e) {
                        $error = 'ERROR: ' . $e->getMessage() . "\n";
                        f3::set('error', $error);
                    }
                } else {
                    throw new Exception($addDocument->error_message);
                }
            } catch (Exception $e) {
                $error = 'ERROR: ' . $e->getMessage() . "\n";
                f3::set('error', $error);
            }
        } else {
            throw new Exception($createForm->error_message);
        }
    } catch (Exception $e) {
        $error = 'ERROR: ' . $e->getMessage() . "\n";
        f3::set('error', $error);
    }
}
//Process template
echo Template::serve('sample32.htm');