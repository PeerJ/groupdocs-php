<?php

    F3::set('userId', '');
    F3::set('privateKey', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $fileGuId = f3::get('POST["fileId"]');
    if (isset($clientId) AND isset($privateKey))
    {
        $iframe = 'https://apps.groupdocs.com/document-viewer/embed/' . $fileGuId . '?frameborder="0" width="600" height="400"';
        f3::set('url', $iframe);
        F3::set('userId', $clientId);
        F3::set('privateKey', $privateKey);
    }
    
    echo Template::serve('sample9.htm');