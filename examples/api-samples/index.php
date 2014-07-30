<?php
require_once __DIR__.'/FatFree_Framework/lib/base.php';
require_once __DIR__.'/vendor/autoload.php';
F3::set('CACHE',FALSE);
F3::set('DEBUG',1);
F3::set('UI','templates/');
F3::set('IMPORTS','inc_samples/');


F3::route('GET /','home');
F3::route('GET /index.php','home');
F3::route('GET|POST /sample1-how-to-login-to-GroupDocs-using-the-api','sample01.php'); //route for GET and POST requests
//F3::route('GET /sample1','sample1.php'); //we can have saparate handles for GET and POST requests
//F3::route('POST /sample1','sample1.php');
F3::route('GET|POST /sample2-how-to-list-files-within-groupdocs-storage-using-the-storage-api','sample02.php');
F3::route('GET|POST /sample3-how-to-upload-a-file-to-groupdocs-using-the-storage-api','sample03.php');
F3::route('GET|POST /sample4-how-to-download-a-file-from-groupdocs-storage-using-the-storage-api','sample04.php');
F3::route('GET|POST /sample5-how-to-copy-move-a-file-using-the-groupdocs-storage-api','sample05.php');
F3::route('GET|POST /sample6-how-to-add-a-signature-to-a-document-in-groupdocs-signature','sample06.php');
F3::route('GET|POST /sample7-how-to-create-a-list-of-thumbnails-for-a-document','sample07.php');
F3::route('GET|POST /sample8-how-to-return-a-url-representing-a-single-page-of-a-document','sample08.php');
F3::route('GET|POST /sample9-how-to-generate-an-embedded-viewer-annotation-url-for-a-document','sample09.php');
F3::route('GET|POST /sample10-how-to-share-a-document-to-other-users','sample10.php');
F3::route('GET|POST /sample11-how-programmatically-create-and-post-an-annotation-into-document','sample11.php');
F3::route('GET|POST /sample12-how-to-list-all-annotations-from-document','sample12.php');
F3::route('GET|POST /sample13-how-to-add-collaborator-to-doc-with-annotations','sample13.php');
F3::route('GET|POST /sample14-how-to-check-the-list-of-shares-for-a-folder','sample14.php');
F3::route('GET|POST /sample15-how-to-check-the-number-of-document\'s-views','sample15.php');
F3::route('GET|POST /sample16-how-to-insert-Assembly-questionary-into-webpage','sample16.php');
F3::route('GET|POST /sample17-how-to-upload-a-file-into-the-storage-and-compress-it-into-zip-archive','sample17.php');
F3::route('GET|POST /sample18-how-to-convert-doc-to-docx-docx-to-doc-docx-to-pdf-and-ppt-to-pdf','sample18.php');
F3::route('GET|POST /sample19-how-to-compare-documents-using-php-sdk','sample19.php');
F3::route('GET|POST /sample20-how-to-get-compare-change-list-for-document-using-php-sdk','sample20.php');
F3::route('GET|POST /sample21-how-to-create-and-upload-envelop-to-groupdocs-account-using-php-sdk','sample21.php');
F3::route('GET|POST /sample22-how-to-create-or-update-user-and-add-him-to-collaborators-using-php-sdk','sample22.php');
F3::route('GET|POST /sample23-how-to-view-document-pages-as-images-using-php-sdk','sample23.php');
F3::route('GET|POST /sample24-how-to-use-storageapi-to-upload-file-from-url-to-groupdocs-account-using-php-sdk','sample24.php');
F3::route('GET|POST /sample25-how-to-merge-assemble-data-fields-in-docx-file-with-data-source-and-get-result-file-as-pdf-file-using-php-sdk','sample25.php');
F3::route('GET|POST /sample26-how-to-use-login-method-in-the-api','sample26.php');
F3::route('GET|POST /sample27-how-to-create-your-own-questionary-using-forms-and-show-the-result-document-using-php-sdk','sample27.php');
F3::route('GET|POST /sample28-how-to-delete-all-annotations-from-document','sample28.php');
F3::route('GET|POST /sample29-how-to-use-filepicker-io-to-upload-document-and-get-it\'s-URL','sample29.php');
F3::route('GET|POST /sample30-how-to-delete-file-from-groupdocs-storage-using-php-sdk','sample30.php');
F3::route('GET|POST /sample31-how-to-dynamically-create-signature-form-using-data-from-html-form','sample31.php');
F3::route('GET|POST /sample32-how-to-create-signature-form-publish-it-and-configure-notification-when-it-was-signed','sample32.php');
F3::route('GET|POST /sample33-how-to-convert-several-html-documents-to-pdf-and-merge-them-to-one-document','sample33.php');
F3::route('GET|POST /sample34-how-to-create-folder-in-the-groupdocs-account','sample34.php');
F3::route('GET|POST /sample35-how-to-create-assembly-from-document-and-merge-fields','sample35.php');
F3::route('GET|POST /sample36-how-to-download-document-after-sign-envelope-using-php-sdk','sample36.php');
F3::route('GET|POST /sample37-how-to-create-and-upload-envelop-to-groupdocs-account-and-get-signed-document-using-php-sdk','sample37.php');
F3::route('GET|POST /sample38-how-to-create-new-user-and-add-him-as-collaborator-to-doc-with-annotations','sample38.php');
F3::route('GET|POST /sample39-how-to-add-a-signature-to-a-document-and-redirect-after-signing-with-groupdocs-widget','sample39.php');
F3::route('GET|POST /sample40-how-to-set-callback-for-signature-form-and-re-direct-when-it-was-signed','sample40.php');
F3::route('GET|POST /sample41-how-to-set-callback-for-annotation-and-manage-user-rights-using-php-sdk','sample41.php');
F3::route('GET|POST /sample42-how-to-download-document-with-annotations-using-php-sdk','sample42.php');
F3::route('GET|POST /sample43-how-to-add-numeration-in-the-doc-file-using-php-sdk','sample43.php');
F3::route('GET|POST /sample44-how-to-assemble-document-and-add-multiple-signatures-and-signers-to-a-document','sample44.php');
F3::route('GET|POST /sample45-how-to-check-statistic-info-for-the-document-using-php-sdk','sample45.php');
F3::route('GET|POST /popup','popup.php');
F3::route('GET|POST /callbacks/signature_callback','callbacks/signature_callback.php');
F3::route('GET|POST /callbacks/signature_check_file','callbacks/signature_check_file.php');
F3::route('GET|POST /callbacks/annotation_callback','callbacks/annotation_callback.php');
F3::route('GET|POST /callbacks/annotation_check_file','callbacks/annotation_check_file.php');
F3::route('GET|POST /callbacks/check_guid','callbacks/check_guid.php');
F3::route('GET|POST /callbacks/compare_callback','callbacks/compare_callback.php');
F3::route('GET|POST /callbacks/compare_check_file','callbacks/compare_check_file.php');
F3::route('GET|POST /callbacks/convert_callback','callbacks/convert_callback.php');
F3::route('GET|POST /callbacks/check_file','callbacks/check_file.php');
F3::route('GET|POST /callbacks/download_file','callbacks/download_file.php');
F3::route('GET|POST /callbacks/sample37_callback','callbacks/sample37_callback.php');
F3::route('GET|POST /callbacks/sample39_callback','callbacks/sample39_callback.php');
F3::route('GET|POST /callbacks/sample40_callback','callbacks/sample40_callback.php');
F3::route('GET|POST /callbacks/sample41_callback','callbacks/sample41_callback.php');
F3::route('GET|POST /callbacks/publish_callback','callbacks/publish_callback.php');

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
