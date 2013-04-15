<?php
    //### This sample will show how to insert Assembly questionary into webpage using PHP SDK
     
    //### Set variables and get POST data
    F3::set('fileId', '');
    $fileId = F3::get('POST["fileId"]');

    function AssebmlyQuestionary($fileId) {
        if (empty($fileId)) {
            throw new Exception('Please enter all required parameters');
        } else {
            F3::set('fileId', $fileId);
            //Get base path
            $basePath = f3::get('POST["server_type"]');
            //Generation of iframe URL using fileGuId
             if($basePath == "https://api.groupdocs.com/v2.0") {
                $iframe = 'http://apps.groupdocs.com/assembly2/questionnaire-assembly/' . $fileId . '" frameborder="0" width="100%" height="600"></iframe>';
            //iframe to dev server
            } elseif($basePath == "https://dev-api.groupdocs.com/v2.0") {
                $iframe = 'http://dev-apps.groupdocs.com/assembly2/questionnaire-assembly/' . $fileId . '" frameborder="0" width="100%" height="600"></iframe>';
            //iframe to test server
            } elseif($basePath == "https://stage-api.groupdocs.com/v2.0") {
                $iframe = 'http://stage-apps.groupdocs.com/assembly2/questionnaire-assembly/' . $fileId . '" frameborder="0" width="100%" height="600"></iframe>';
            //Iframe to realtime server
            } elseif ($basePath == "http://realtime-api.groupdocs.com") {
                $iframe = 'http://realtime-apps.groupdocs.com/assembly2/questionnaire-assembly/' . $fileId . '" frameborder="0" width="100%" height="600"></iframe>';
            }

            F3::set('iframe', $iframe);
        }
    }

    try {
        AssebmlyQuestionary($fileId);
    } catch (Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }

    // Process template
    echo Template::serve('sample16.htm');