<?php
    
    F3::set('userId', '');
    F3::set('privateKey', '');
    F3::set('fileId', '');
    F3::set('massage', '');
    F3::set('iframe', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    
    function Upload($clientId, $privateKey)
    {
        if (empty($clientId) || empty($privateKey))
        {
            throw new Exception('You do not enter your User Id or Private Key');
        }
        else
        {
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
            $signer = new GroupDocsRequestSigner($apiKey);
            $apiClient = new APIClient($signer); // new way to create apiClient - PHP SDK 1.1
            $apiStorage = new StorageApi($apiClient);
            $uploadResult = $apiStorage->Upload($clientID, $name, 'uploaded', $fs);
            if ($uploadResult->status == "Ok")
            {
                $result = array();
                $result = array('iframe' => '<iframe src="https://apps.groupdocs.com/document-viewer/Embed/' . $uploadResult->result->guid . '" frameborder="0" width="720" height="600"></iframe>',
                                'name' => $name);
                return $result;
            } 
        }  
     }
     try
     {
         $upload = Upload($clientId, $privateKey);
         $massage = '<p>File was uploaded to GroupDocs. Here you can see your <strong>' . $upload['name'] . '</strong> file in the GroupDocs Embedded Viewer.</p>';
         F3::set('massage', $massage);
         F3::set('iframe', $upload['iframe']);
     }
     catch (Exception $e)
     {
         $error = 'ERROR: ' .  $e->getMessage() . "\n";
         f3::set('error', $error);
     }
     F3::set('userId', $clientId);
     F3::set('privateKey', $privateKey);
     echo Template::serve('sample3.htm');