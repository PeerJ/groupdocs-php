<?php
    //<i>This sample will show how to use <b>SignDocument</b> method from Signature Api to Sign Document and upload it to user storage</i>

    //###Set variables and get POST data
    F3::set('userId', '');
    F3::set('privateKey', '');
    F3::set('fileId', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');

    function signDocument($clientId, $privateKey) {
        //###Check clientId, privateKey
        if (!isset($clientId) || !isset($privateKey)) {
			
			throw new Exception('You do not enter all parameters');
			
        }else{   
            //Get chosen local file
            $fi_document = $_FILES["fi_document"];
            $fi_signature = $_FILES["fi_signature"];
            //Check is both file chosen
            if ($fi_document == null || $fi_signature == null) {
                throw new Exception("please choose document to sign and signature file");
            }
            //Get base path
            $basePath = f3::get('POST["server_type"]');
            //Get document to sign content
            $docContent = file_get_contents($fi_document["tmp_name"]);
            //Get signature file content
            $signatureContent = file_get_contents($fi_signature["tmp_name"]);
            //Create SignatureSignDocumentDocumentSettings object
            $document = new SignatureSignDocumentDocumentSettings();
            $document->name = $fi_document["name"];
            $document->data = "data:" . $fi_document["type"] . ";base64," . base64_encode($docContent);
            
            //Create SignatureSignDocumentSignerSettings object
            $signer = new SignatureSignDocumentSignerSettings();
            $signer->placeSignatureOn = "";
            $signer->name = $fi_signature["name"];
            $signer->data = "data:" . $fi_signature["type"] . ";base64," . base64_encode($signatureContent);
            $signer->height = 40;
            $signer->width = 100;
            $signer->top = 0.83319;
            $signer->left = 0.72171;
            //###Create Signer, ApiClient and Storage Api objects

            //Create signer object
            $signature = new GroupDocsRequestSigner($privateKey);
            //Create apiClient object
            $apiClient = new APIClient($signature);
            //Create Storage Api object
            $signatureApi = new SignatureApi($apiClient);
            //Create AsyncApi object
            $asyncApi = new AsyncApi($apiClient);
             //Check if user entered base path
            if ($basePath == "") {
                //If base base is empty seting base path to prod server
                $basePath = 'https://api.groupdocs.com/v2.0';
            }
            //Set base path
            $signatureApi->setBasePath($basePath);
            $asyncApi->setBasePath($basePath);
            //Create setting variable for signature SignDocument method
            $settings = new SignatureSignDocumentSettings();
            $settings->documents = array(get_object_vars($document));
            $settings->signers = array(get_object_vars($signer));

            //###Make a request to Signature Api for sign document

            //Sign document using current user id and sign settings
            $response = $signatureApi->SignDocument($clientId, $settings);
            $iframe = "";
            //Check is file signed and uploaded successfully
            if ($response->status == "Ok") {
                $getDocumentStatus = $signatureApi->GetSignDocumentStatus($clientId, $response->result->jobId);
                //Get file guid
                if ($getDocumentStatus->status == "Ok") {
                    $guid = $getDocumentStatus->result->documents[0]->documentId;
                } else {
                    throw new Exception($getDocumentStatus->error_message);
                }

                 if($basePath == "https://api.groupdocs.com/v2.0") {
                    $iframe = 'http://apps.groupdocs.com/document-viewer/embed/' . $guid;
                //iframe to dev server
                } elseif($basePath == "https://dev-api.groupdocs.com/v2.0") {
                    $iframe = 'http://dev-apps.groupdocs.com/document-viewer/embed/' . $guid;
                //iframe to test server
                } elseif($basePath == "https://stage-api.groupdocs.com/v2.0") {
                    $iframe = 'http://stage-apps.groupdocs.com/document-viewer/embed/' . $guid;
                //Iframe to realtime server
                } elseif ($basePath == "http://realtime-api.groupdocs.com") {
                    $iframe = 'http://realtime-apps.groupdocs.com/document-viewer/embed/' . $guid;
                }
            } else {
                throw new Exception($response->error_message);
            }
            return $iframe;
        }
    }
   
try {
        $iframe = signDocument($clientId, $privateKey);
        F3::set('iframe', $iframe);
    } catch(Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }
    
    //Process template
    F3::set('userId', $clientId);
    F3::set('privateKey', $privateKey);
    echo Template::serve('sample06.htm');