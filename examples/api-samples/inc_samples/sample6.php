<?php

    F3::set('userId', '');
    F3::set('privateKey', '');
    F3::set('fileId', '');
    $postdata = file_get_contents("php://input");
    
    if (!empty($postdata))
    {
        $json_post_data = json_decode($postdata, true);
        $clientId = $json_post_data['userId'];
        $privateKey = $json_post_data['privateKey'];
        $documents = $json_post_data['documents'];
        $signers = $json_post_data['signers'];
        for ($i = 0; $i < count($signers); $i++) 
        {
            $signers[$i]['placeSingatureOn'] = '';
        }
        $signer = new GroupDocsRequestSigner($privateKey);
        $apiClient = new APIClient($signer);
        $signatureApi = new SignatureApi($apiClient);
        $settings = new SignatureSignDocumentSettings();
        $settings->documents = $file;
        $settings->signers = $signers;
        $response = $signatureApi->SignDocument($clientId, $settings);
        $uploadedFile = $_FILES['file'];
        $clientID = strip_tags(stripslashes(trim($clientId))); //ClientId==UserId
        $apiKey = strip_tags(stripslashes(trim($privateKey))); //ApiKey==PrivateKey
        if (null === $uploadedFile)
        {
            return new RedirectResponse("/sample3");
        }
        $tmp_name = $uploadedFile['tmp_name']; //temp name of the file
        $name = $uploadedFile['name']; //original name of the file
        $fs = FileStream::fromFile($tmp_name);    
        $apiStorage = new StorageApi($apiClient);
        $uploadResult = $apiStorage->Upload($clientID, $name, 'uploaded', $fs);
        if ($uploadResult->status == "Ok")
        {
            $result = array();
            $result = array('iframe' => '<iframe src="https://apps.groupdocs.com/document-viewer/Embed/' . $uploadResult->result->guid . '" frameborder="0" width="720" height="600"></iframe>',
                            'name' => $name);
            return f3::set('iframe', $result);
        }
    }
    echo Template::serve('sample6.htm');