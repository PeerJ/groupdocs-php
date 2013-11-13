## Examples

### GroupDocs PHP SDK Api samples

This is the GroupDocs PHP SDK Api samples application written with FatFree framework. Here you can find a lot of samples of GroupDocs SDK API functions using.

### How to deploy and run samples

 1. Download api-samples folder or full SDK (you can find api-samples under examples folder).
 2. Copy all files from api-samples folder to web root folder.
 3. Configure composer.json to use required PHP SDK version.
 4. Open console, cd to web root folder and run command: php composer.phar install (this will download GroupDocs PHP SDK into vendor folder and create autoload.php).
 5. Restart apache and open http://"VIRTUALHOST_NAME"/index.php in your browser.

### Requirements:

* PHP 5.3
* Apache ModRewrite
* PHP Curl extension
* PHP Sockets extension (php_sockets.dll)
* composer.phar (http://getcomposer.org/download/ or use included version)

### How to configure composer.json

To download required version of PHP SDK with composer it's enough to set this setting to composer.json

     {
         "require": {
             "groupdocs/groupdocs-php": "v1.7.3"
         }
      }

To update sdk: php composer.phar update

To see all available PHP SDK versions tags visit this page - https://packagist.org/packages/groupdocs/groupdocs-php

### Live Samples

All this samples you can try on Heroku cloud platform by clicking this link http://groupdocs-php-samples.herokuapp.com/ 
This samples show ho to use GroupDocs api to work with your account by using User Id and Private Key of your account. In this samples you can found how to upload/download file, sign document, compare documents,
make annotations in document and more.

### List of samples:

Sample01 - How to login to GroupDocs using the API
Sample02 - How to list files within GroupDocs Storage using the Storage API
Sample03 - How to upload a file to GroupDocs using the Storage API
Sample04 - How to download a file from GroupDocs Storage using the Storage API
Sample05 - How to copy / move a file using the GroupDocs Storage API
Sample06 - How to add a Signature to a document in GroupDocs Signature
Sample07 - How to create a list of thumbnails for a document
Sample08 - How to return a URL representing a single page of a Document
Sample09 - how to generate an embedded Viewer/Annotation URL for a Document
Sample10 - How to share a document to other users
Sample11 - How programmatically create and post an annotation into document. How to delete the annotation
Sample12 - How to list all annotations from document
Sample13 - How to add collaborator to doc with annotations
Sample14 - How to check the list of shares for a folder
Sample15 - How to check the number of document's views
Sample16 - How to insert Assembly questionary into webpage
Sample17 - How to upload a file into the storage and compress it into zip archive
Sample18 - How to convert Doc to Docx, Docx to Doc, Docx to PDF and PPT to PDF
Sample19 - How to Compare documents using PHP SDK
Sample20 - How to Get Compare Change list for document using PHP SDK
Sample21 - How to Create and Upload Envelop to GroupDocs account using PHP SDK
Sample22 - This sample will show how create or update user and add him to collaborators using PHP SDK
Sample23 - How to View Document pages as images using PHP SDK
Sample24 - How to use StorageApi to upload file from URL to GroupDocs account using PHP SDK
Sample25 - How to merge/assemble data fields in docx file with data source and get result file as PDF file using PHP SDK
Sample26 - How to use login method in the API
Sample27 - How to create your own questionary using forms and show the result document using PHP SDK
Sample28 - How to delete all annotations from document
Sample29 - How to use Filepicker.io to upload document and get it's URL
Sample30 - How to delete file from GroupDocs Storage using PHP SDK
Sample31 - How to dinamically create Signature Form using data from HTM form
Sample32 - How to create signature form, publish it and configure notification when it was signed
Sample33 - How to convert several HTML documents to PDF and merge them to one document
Sample34 - How to create folder in the GroupDocs account



###[View, Sign, Manage, Annotate, Assemble, Compare and Convert Documents with GroupDocs](http://groupdocs.com)
* [View and Annotate Doc, PDF, Docx, PPT and other documents online with GroupDocs Viewer](http://groupdocs.com/apps)
* [All GroupDocs SDK] (http://groupdocs.com/api/sdk-platforms)
* [All GroupDocs SDK examples] (http://groupdocs.com/api/sdk-examples)

###Created by [Marketplace Team](http://groupdocs.com/marketplace/).
