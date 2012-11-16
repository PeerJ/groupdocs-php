<?php

    F3::set('userId', '');
    F3::set('privateKey', '');
    F3::set('fileId', '');
    F3::set('massage', '');
    F3::set('iframe', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    if (isset($clientId) AND isset($privateKey))
    {
        $uploadedFile = $_FILES['file'];
        
        $clientID = strip_tags(stripslashes(trim($clientId))); //ClientId==UserId
        $apiKey = strip_tags(stripslashes(trim($privateKey))); //ApiKey==PrivateKey
        
        if (null === $uploadedFile)
            return new RedirectResponse("/sample3");

        $tmp_name = $uploadedFile['tmp_name']; //temp name of the file
        $name = $uploadedFile['name']; //original name of the file
        $fs = FileStream::fromFile($tmp_name);
        $signer = new GroupDocsRequestSigner($apiKey);
        $apiClient = new APIClient($signer); // new way to create apiClient - PHP SDK 1.1
        $apiStorage = new StorageApi($apiClient);
       
        $result = $apiStorage->Upload($clientID, $name, 'uploaded', $fs);
       
        // var_dump($result);exit;
        if ($result->status == 'Ok')
        {
           $massage = '<p>File was uploaded to GroupDocs. Here you can see your <strong>' . $name . '</strong> file in the GroupDocs Embedded Viewer.</p>';
           $iframe = '<iframe src="https://apps.groupdocs.com/document-viewer/Embed/' . $result->result->guid . '" frameborder="0" width="720" height="600"></iframe>';
           F3::set('massage', $massage);
           F3::set('iframe', $iframe);
           F3::set('userId', $clientId);
           F3::set('privateKey', $privateKey);
        } 
     }
    
     echo Template::serve('sample3.htm');