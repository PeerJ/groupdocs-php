<?php

    F3::set('userId', '');
    F3::set('privateKey', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $fileGuId = f3::get('POST["fileId"]');
    $pageNumber = f3::get('POST["pageNumber"]');
    if (isset($clientId) AND isset($privateKey))
    {
        F3::set('userId', $clientId);
        F3::set('privateKey', $privateKey);
        $signer = new GroupDocsRequestSigner($privateKey);
        $apiClient = new APIClient($signer); // PHP SDK V1.1
        $docApi = new DocApi($apiClient);
        $URL = $docApi->GetDocumentPagesImageUrls($clientId, $fileGuId, (int)$pageNumber, 1, '600x750');
        f3::set('url', $URL->result->url[0]);
        f3::set('fileId', $fileGuId);
        f3::set('pageNumber', $pageNumber);
    }
    
    echo Template::serve('sample8.htm');