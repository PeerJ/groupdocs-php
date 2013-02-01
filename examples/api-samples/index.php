<?php
require_once __DIR__.'/FatFree_Framework/lib/base.php';
require_once __DIR__.'/vendor/autoload.php';
F3::set('CACHE',FALSE);
F3::set('DEBUG',1);
F3::set('UI','templates/');
F3::set('IMPORTS','inc_samples/');


F3::route('GET /','home');
F3::route('GET /index.php','home');
F3::route('GET|POST /sample1','sample1.php'); //route for GET and POST requests
//F3::route('GET /sample1','sample1.php'); //we can have saparate handles for GET and POST requests
//F3::route('POST /sample1','sample1.php');

F3::route('GET|POST /sample2','sample2.php');
F3::route('GET|POST /sample3','sample3.php');
F3::route('GET|POST /sample4','sample4.php');
F3::route('GET|POST /sample5','sample5.php');
F3::route('GET|POST /sample6','sample6.php');
F3::route('GET|POST /sample7','sample7.php');
F3::route('GET|POST /sample8','sample8.php');
F3::route('GET|POST /sample9','sample9.php');
F3::route('GET|POST /sample10','sample10.php');
F3::route('GET|POST /sample11','sample11.php');
F3::route('GET|POST /sample12','sample12.php');
F3::route('GET|POST /sample13','sample13.php');
F3::route('GET|POST /sample14','sample14.php');
F3::route('GET|POST /sample15','sample15.php');
F3::route('GET|POST /sample16','sample16.php');
F3::route('GET|POST /sample17','sample17.php');
F3::route('GET|POST /sample18','sample18.php');
F3::route('GET|POST /sample19','sample19.php');
F3::route('GET|POST /sample20','sample20.php');
F3::route('GET|POST /sample21','sample21.php');
F3::route('GET|POST /signature_callback','signature_callback.php');
F3::route('GET|POST /signature_check_file.php','signature_check_file.php');

F3::route('GET /about_framework.php','about');

	function home() {
        //sample code
        //$apiKey = 'cebff9b66782df9e519c1fc11c0a7ac3';
        //$clientId = '60bef2f950c9cd0e';
        //$fileId = '47d86daacf8bbcd66c1dab08791a459272dcfa48cbc5ed8f07ec297f43d21186';
        //$signer = new GroupDocsRequestSigner($apiKey);
        //$apiClient = new APIClient($signer); // PHP SDK V1.1
        //$antApi = new AntApi($apiClient);
        //$annotations = $antApi->ListAnnotations($clientId, $fileId);
        //echo var_dump($annotations);
		echo Template::serve('index.htm');
	}
    function about() {
		echo Template::serve('welcome.htm');
	}
F3::run();
