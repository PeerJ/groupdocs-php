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
            //Create User info object
//            $mgmtApi->setBasePath("https://stage-api.groupdocs.com/v2.0");
//            $colUser = $mgmtApi->GetAccountUsers($clientId);
//            for($i = 1; $i < count($colUser->result->users); $i++) {
//               $del = $mgmtApi->DeleteAccountUser($clientId, $colUser->result->users[1]->nickname);
//            }
            $role = new RoleInfo();
            $role->id = 3;
            $role->name = "User";
            $user = new UserInfo();
            //Set nick name as entered first name
            $user->nickname = $firstName;
            //Set first name as entered first name
            $user->firstname = $firstName;
            //Set last name as entered last name
            $user->lastname = $lastName;
            //Set email as entered email
            $user->primary_email = $email;
           // $user->roles = $role;
            //Creating of new user. $clientId - user id, $firstName - entered first name, $user - object with new user info
            $newUser = $mgmtApi->UpdateAccountUser($clientId, $firstName, $user);
            //Check the result of the request
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
            } else {
                return F3::set("message", $newUser->error_message);
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
