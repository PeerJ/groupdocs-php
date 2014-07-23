<?php

//### This sample will show how to check statistic info for the document using PHP SDK
// Set variables and get POST data
F3::set('userId', '');
F3::set('privateKey', '');
$clientId = F3::get('POST["clientId"]');
$privateKey = F3::get('POST["privateKey"]');
$fileName = F3::get('POST["fileName"]');
$folderName = F3::get('POST["folderName"]');
//Check entered data for empty values
if (empty($clientId) || empty($privateKey) || empty($fileName)) {
    $error = 'Please enter all required parameters';
    F3::set('error', $error);
} else {
    //Get base path
    $basePath = F3::get('POST["basePath"]');
    F3::set('userId', $clientId);
    F3::set('privateKey', $privateKey);
    //### Create Signer, ApiClient and Document Api objects
    // Create signer object
    $signer = new GroupDocsRequestSigner($privateKey);
    // Create apiClient object
    $apiClient = new ApiClient($signer);
    // Create Document object
    $docApi = new DocApi($apiClient);
    //Create Storage object
    $storageApi = new StorageApi($apiClient);
    if ($basePath == "") {
        //If base base is empty seting base path to prod server
        $basePath = 'https://api.groupdocs.com/v2.0';
    }
    //Set base path
    $docApi->setBasePath($basePath);
    $storageApi->setBasePath($basePath);
    
    try {
        //Check folder name, if empty - set folder name to empty string
        if (empty($folderName) || $folderName == Null) {
            $folderName = "";
        }
        //Get all files
        $files = $storageApi->ListEntities($clientId, $folderName, 0);
        //Obtaining file guid by file name
        foreach ($files->result->files as $item) {
            if ($item->name == $fileName) {
                $fileGuid = $item->guid;
            }
        }
        //Get document info
        $docInfo = $docApi->GetDocumentMetadata($clientId, $fileGuid);
        if ($docInfo->status == "Ok") {
            // Check the result of the request
            if (isset($docInfo->result)) {
                //Generate table with statistic info
                $result = "<table class='border'>";
                $result .= "<tr><td><font color='green'>Parameter</font></td><td>
                    <font color='green'>Info</font></td></tr>";
                //Loops for interating all elements in responce object
                foreach ($docInfo->result as $parameter => $info) {
                    $type = gettype($info);
                    if ($type == "object") {
                        foreach ($info as $subParameter => $subInfo) {
                            if (gettype($subInfo) == "object") {
                                foreach ($subInfo as $name => $data) {
                                    $result .= "<tr><td>" . $name . "</td><td>" . $data . "</td></tr>";
                                }
                            } else {
                                $result .= "<tr><td>" . $subParameter . "</td><td>" . $subInfo . "</td></tr>";
                            }
                        }
                    } else {
                        $result .= "<tr><td>" . $parameter . "</td><td>" . $info . "</td></tr>";
                    }
                }
                $result .= "</table>";
                // If request was successfull - set annotations variable for template
                F3::set('result', $result);
                F3::set('folderName', $folderName);
                F3::set('fileName', $fileName);
            }
        } else {
            throw new Exception($docInfo->error_message);
        }
    } catch (Exception $e) {
        $error = 'ERROR: ' . $e->getMessage() . "\n";
        F3::set('error', $error);
    }
}

// Process template
echo Template::serve('sample45.htm');
