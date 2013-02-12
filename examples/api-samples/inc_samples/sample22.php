<?php
    //### This sample will show how create or update user and add him to collaborators using PHP SDK
    
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
    $firstName = F3::get('POST["first_name"]');
    $fileId = F3::get('POST["fileId"]');
    $lastName = F3::get('POST["last_name"]');

    function updateUser($clientId, $privateKey, $email, $firstName, $fileId, $lastName) {
        //Check if all requared parameters were transferred
        if (empty($clientId) || empty($privateKey) || empty($email) || empty($firstName) || empty($fileId) || empty($lastName)) {
            //if not send error message
            throw new Exception('Please enter all required parameters');
        } else {
            //Set variables for template "You are entered" block
            F3::set('userId', $clientId);
            F3::set('privateKey', $privateKey);
            F3::set('email', $email);
            F3::set('first_name', $firstName);
            F3::set('fileId', $fileId);
            F3::set('last_name', $lastName);

            //### Create Signer, ApiClient and Mgmt Api objects
            // Create signer object
            $signer = new GroupDocsRequestSigner($privateKey);

            // Create apiClient object
            $apiClient = new ApiClient($signer);

            // Create MgmtApi object
            $mgmtApi = new MgmtApi($apiClient);

            // Make a request to Mgmt API using clientId
            $userInfo = $mgmtApi->GetUserProfile($clientId);
            //Get user info data
            $user = $userInfo->result->user;
            
            //###Change user data
            
            //Change first name to entered first name
            $user->firstname = $firstName;
            //Change last name to entered last name
            $user->lastname = $lastName;
            //Activate new user
            $user->active = true;
            //Change email to entered email
            $user->primary_email = $email;
            //Creating of new user. $clientId - user id, $firstName - entered first name, $user - object with new user info
            $newUser = $mgmtApi->UpdateAccountUser($clientId, $firstName, $user);
            
            // Check the result of the request
            if ($newUser->status == "Ok") {
                //### If request was successfull
                
                //Create Annotation api object
                $ant = new AntApi($apiClient);
                //Make request to Annotation api to receive all collaborators for entered file id
                $getCollaborators = $ant->GetAnnotationCollaborators($clientId, $fileId);
                //Set reviewers rights for new user. $newUser->result->guid - GuId of created user, $fileId - entered file id, 
                //$getCollaborators->result->collaborators - array of collabotors in which new user will be added
                $setReviewer = $ant->SetReviewerRights($newUser->result->guid, $fileId, $getCollaborators->result->collaborators);
                //Set callback url. CallBack work results you can see here: http://groupdocs-php-samples.herokuapp.com/callbacks/annotation_check_file
                $callBackUrl = "http://groupdocs-php-samples.herokuapp.com/callbacks/annotation_callback";
                //Createing an array with data for callBack session
                $arrayForJson = array($newUser->result->guid, $fileId, $callBackUrl);
                //Encoding to json array with data for callBack session
                $json = json_encode($arrayForJson);
                //Make request to Annotation api to set CallBack session
                $setCallBack = $ant->SetSessionCallbackUrl($json, "", "");
                //Generating iframe for template
                $iframe = 'https://apps.groupdocs.com//document-annotation2/embed/' . $fileId . '?&uid=' . $newUser->result->guid . '&download=true frameborder="0" width="720" height="600"';
                //Set variable with work results for template
                return F3::set('url', $iframe);
            }
        }
    }

    try {
        updateUser($clientId, $privateKey, $email, $firstName, $fileId, $lastName);
    } catch (Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }

    // Process template
    echo Template::serve('sample22.htm');