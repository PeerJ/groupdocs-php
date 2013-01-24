<?php
    /*
     * This sample will show how to insert Assembly questionary into webpage using PHP SDK
     */

    ### Set variables and get POST data
    F3::set('fileId', '');
    $fileId = F3::get('POST["file_id"]');

    function AssebmlyQuestionary($fileId) {
        if (empty($fileId)) {
            throw new Exception('Please enter all required parameters');
        } else {
            F3::set('fileId', $fileId);

            # Construct iframe using fileId
            $iframe = '<iframe src="https://apps.groupdocs.com/document-viewer/Embed/' . $fileId . '" frameborder="0" width="720" height="600"></iframe>';

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