<?php
    //### This sample will show how to add collaborator to doc with annotations
    
    //### Set variables and get POST data
    F3::set('userId', '');
    F3::set('privateKey', '');
    F3::set('email', '');
    F3::set('first_name', '');
    F3::set('fileId', '');
    F3::set('last_name', '');
    $clientId = F3::get('POST["client_id]');
    $privateKey = F3::get('POST["private_key"]');
    $email = F3::get('POST["email"]');
    $first_name = F3::get('POST["first_name"]');
    $fileId = F3::get('POST["fileId"]');
    $last_name = F3::get('POST["last_name"]');

    function updateUser($clientId, $privateKey, $email, $first_name, $fileId, $last_name) {

        if (empty($email) || empty($first_name) || empty($last_name)) {
            throw new Exception('Please enter all required parameters');
        } else {
            F3::set('userId', $clientId);
            F3::set('privateKey', $privateKey);
            F3::set('email', $email);
            F3::set('first_name', $first_name);
            F3::set('fileId', $fileId);
            F3::set('last_name', $last_name);

            //### Create Signer, ApiClient and Annotation Api objects
            // Create signer object
            $signer = new GroupDocsRequestSigner($privateKey);

            // Create apiClient object
            $apiClient = new ApiClient($signer);

            // Create Annotation object
            $mgmtApi = new MgmtApi($apiClient);

            // Make a request to Annotation API using clientId and fileId
            $userInfo = $mgmtApi->GetUserProfile($clientId);
            $user = $userInfo->result->user;
            $user->firstname = $first_name;
            $user->lastname = $last_name;
            $user->active = true;
            $user->primary_email = $email;
            
            $newUser = $mgmtApi->UpdateAccountUser($clientId, $first_name, $user);
            
            // Check the result of the request
            if ($newUser->status == "Ok") {
                // If request was successfull - set annotations variable for template
                $ant = new AntApi($apiClient);
                $addCollaborator = $ant->AddAnnotationCollaborator($newUser->result->guid, $fileId);
                $callBackUrl = "http://groupdocs-php-samples.herokuapp.com/callbacks/annotation_callback";
                $arrayForJson = array($newUser->result->guid, $fileId, $callBackUrl);
                $json = json_encode($arrayForJson);
                $setCallBack = $ant->SetSessionCallbackUrl($json, "", "");
                $iframe = 'https://apps.groupdocs.com//document-annotation2/embed/' . $fileId . '?&uid=' . $newUser->result->guid . '&download=true frameborder="0" width="720" height="600"';

                return F3::set('url', $iframe);
            }
        }
    }

    try {
        updateUser($clientId, $privateKey, $email, $first_name, $fileId, $last_name);
    } catch (Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }

    // Process template
    echo Template::serve('sample22.htm');