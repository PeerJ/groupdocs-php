<?php 

class GroupDocsRequestSigner implements RequestSigner {
	
	function __construct($privateKey){
		$this->privateKey = $privateKey;
	}
    
    public function signUrl($url){
		$urlParts = parse_url($url);
		$pathAndQuery = $urlParts['path'].(empty($urlParts['query']) ? "" : "?".$urlParts['query']);
		$signature = base64_encode(hash_hmac("sha1", APIClient::encodeURI($pathAndQuery), $this->privateKey, true));
		if(substr($signature, -1) == '='){
			$signature = substr($signature, 0, - 1);
		}
		$url = $url . (empty($urlParts['query']) ? '?' : '&') . 'signature=' . APIClient::encodeURIComponent($signature);
		return $url;
	}
        
    public function signContent($requestBody, $headers){
        return $requestBody;
	}
}
