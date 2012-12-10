<?php

    F3::set('userId', '');
    F3::set('privateKey', '');
    F3::set('fileId', '');
    $clientId = F3::get('POST["client_id"]');
    $privateKey = F3::get('POST["private_key"]');
    
    function UserInfo($clientId, $privateKey)
    {
        if (empty($clientId) || empty($privateKey)) {
            throw new Exception('Please enter all required parameters');
        } else {
            F3::set('userId', $clientId);
            F3::set('privateKey', $privateKey);

            $signer = new GroupDocsRequestSigner($privateKey);
            $apiClient = new APIClient($signer); // PHP SDK V1.1

            $mgmtApi = new MgmtApi($apiClient);
            $userAccountInfo = $mgmtApi->GetUserProfile($clientId);
            if (isset($userAccountInfo->result) AND isset($userAccountInfo->result->user)) {
                return F3::set('userInfo', $userAccountInfo->result->user);
            }
        }
    }
     
    try {
        UserInfo($clientId, $privateKey);
    } catch (Exception $e) {
        $error = 'ERROR: ' .  $e->getMessage() . "\n";
        f3::set('error', $error);
    }
    echo Template::serve('sample1.htm');