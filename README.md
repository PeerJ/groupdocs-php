 GroupDocs PHP SDK [![Build Status](https://secure.travis-ci.org/groupdocs/groupdocs-php.png)](http://travis-ci.org/groupdocs/groupdocs-php)
=============

Latest SDK version 2.5.0

###GroupDocs.Total for Cloud API

GroupDocs.Total for Cloud is a suite of RESTful APIs that allows developers to seamlessly add powerful document collaboration tools to their web/mobile applications or sites. The suite includes the following tools:

**GroupDocs.Viewer for Cloud API**
An embeddable HTML-based document viewer that enables end users to view over 50 common document and image types (including PDF and Microsoft Office) using any HTML5-compliant web-browser and without having to install any office software. <a href=” http://groupdocs.com/cloud/document-viewer-api”>Learn more»</a>

**GroupDocs.Annotation for Cloud API**
GroupDocs.Annotation lets multiple users to collaboratively review and annotate the same document in real time on the web. <a href=”http://groupdocs.com/cloud/document-annotation-api”>Learn more»</a>

**GroupDocs.Assembly for Cloud API**
With this tool, users can generate essential business documents on-the-fly by automatically merging their existing templates in a PDF or Microsoft Word format with data collected via online forms. <a href=”http://groupdocs.com/cloud/document-assembly-api”>Learn more»</a>

**GroupDocs.Signature for Cloud API**
GroupDocs.Signature allows users to sign documents electronically directly from within your application or site.
<a href=”http://groupdocs.com/cloud/electronic-signature-api”>Learn more»</a>

**GroupDocs.Comparison for Cloud API**
With GroupDocs.Comparison, users can compare two versions of a PDF, Microsoft Word, Excel, PowerPoint, ODT, plain text or HTML documents on the web, without having to install the original software used to create the documents. <a href=”http://groupdocs.com/cloud/document-comparison-api”>Learn more»</a>

**GroupDocs.Conversion for Cloud API**
A universal document conversion tool that allows users to convert back and forth between over 50 common document and image types. <a href=”http://groupdocs.com/cloud/document-conversion-api”>Learn more»</a>

All APIs listed here can be used individually, or under a single GroupDocs.Total for Cloud API subscription.

## Requirements

* PHP 5.3
* Apache ModRewrite
* PHP Curl extension
* composer.phar (http://getcomposer.org/download/ or use included version, this requirement needed
only if you want to install PHP SDK from Packagist repository)


## Installation

You can use the [Composer](http://getcomposer.org/) to download and install SDK.
GroupDocs SDK is now in [Packagist](https://packagist.org/packages/groupdocs/groupdocs-php). Please check our packagist repository to find the latest SDK package version for `composer.json` file.

### Composer

To add SDK as a local, per-project dependency to your project, simply add a dependency on `groupdocs/groupdocs-php` to your project's `composer.json` file:

	{
		"require": {
			"groupdocs/groupdocs-php": "2.5.0"
		},
		"require-dev": {
			"phpunit/phpunit": "3.7.*"
		}
	}
	
To get the lastest SDK code from master branch use "dev-master" version. With this version the top revision of the master branch will be cloned by composer.

### Usage Example
	 //Create signer object
    $signer = new GroupDocsRequestSigner($privateKey);
    //Create apiClient object
    $apiClient = new APIClient($signer);
  	$api = new AntAPI($apiClient);
	$response = $api->ListAnnotations($userId, $fileId);

###ChangeLog

Change log content was moved to separate file - https://github.com/groupdocs/groupdocs-php/blob/master/changelog.md

###[Sign, Manage, Annotate, Assemble, Compare and Convert Documents with GroupDocs](http://groupdocs.com)
1. [Sign documents online with GroupDocs Signature](http://groupdocs.com/apps/signature)
2. [PDF, Word and Image Annotation with GroupDocs Annotation](http://groupdocs.com/apps/annotation)
3. [Online DOC, DOCX, PPT Document Comparison with GroupDocs Comparison](http://groupdocs.com/apps/comparison)
4. [Online Document Management with GroupDocs Dashboard](http://groupdocs.com/apps)
5. [Doc to PDF, Doc to Docx, PPT to PDF, and other Document Conversions with GroupDocs Viewer](http://groupdocs.com/apps/viewer)
6. [Online Document Automation with GroupDocs Assembly](http://groupdocs.com/apps/assembly)

License
-------

	Copyright 2012 GroupDocs.

	Licensed under the Apache License, Version 2.0 (the "License");
	you may not use this file except in compliance with the License.
	You may obtain a copy of the License at

	   http://www.apache.org/licenses/LICENSE-2.0

	Unless required by applicable law or agreed to in writing, software
	distributed under the License is distributed on an "AS IS" BASIS,
	WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	See the License for the specific language governing permissions and
	limitations under the License.
