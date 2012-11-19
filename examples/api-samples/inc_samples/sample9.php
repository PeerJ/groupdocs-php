<?php

    F3::set('userId', '');
    F3::set('privateKey', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    $fileGuId = f3::get('POST["fileId"]');
    $width = f3::get('POST["width"]');
    $height = f3::get('POST["height"]');
    
    function Iframe($file_Id, $width='400', $height='650'){
        var_dump($file_Id);
        if ($file_Id == "")
    {
        throw new Exception('You do not enter FILE ID');
    } 
    else
    {
        $iframe = 'https://apps.groupdocs.com/document-viewer/embed/' . $file_Id . '?frameborder="0" width="'.$width.'" height="'.$height.'"';
        return f3::set('url', $iframe);;
    }
    }
    
    try 
    {
        Iframe($fileGuId, $width, $height);
    } 
    catch (Exception $e)
    {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }
    F3::set('userId', $clientId);
    F3::set('privateKey', $privateKey);
    F3::set('width', $width);
    F3::set('height', $height);
    f3::set('fileId', $fileGuId);
    echo Template::serve('sample9.htm');