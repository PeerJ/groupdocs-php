 GroupDocs PHP SDK [![Build Status](https://secure.travis-ci.org/groupdocs/groupdocs-php.png)](http://travis-ci.org/groupdocs/groupdocs-php)
=============

Latest SDK version 1.7.0.

## Requirements

* SDK requires PHP 5.3 (or later).

## Installation

You can use the [Composer](http://getcomposer.org/) to download and install SDK.
GroupDocs SDK is now in [Packagist](https://packagist.org/packages/groupdocs/groupdocs-php). Please check our packagist repository to find the latest SDK package version for `composer.json` file.

### Composer

To add SDK as a local, per-project dependency to your project, simply add a dependency on `groupdocs/groupdocs-php` to your project's `composer.json` file:

	{
		"require": {
			"groupdocs/groupdocs-php": "1.7.0"
		},
		"require-dev": {
			"phpunit/phpunit": "3.7.*"
		}
	}
	
To get the lastest SDK code from master branch use "dev-master" version. With this version the top revision of the master branch will be cloned by composer.

### Usage Example
	$apiClient = new APIClient(new GroupDocsRequestSigner($privateKey));
	$api = new AntAPI($apiClient);
	$response = $api->ListAnnotations($userId, $fileId);

###ChangeLog

2013-03-11

1. Service update to fix and clean travis build
2. SDK v1.5.0 released.

2012-12-07

1. Parameter check in function "deserialize" in APIClient.php fixed.
2. Adjusted examples to tests

###[Sign, Manage, Annotate, Assemble, Compare and Convert Documents with GroupDocs](http://groupdocs.com)
1. [Sign documents online with GroupDocs Signature](http://groupdocs.com/apps/signature)
2. [PDF, Word and Image Annotation with GroupDocs Annotation](http://groupdocs.com/apps/annotation)
3. [Online DOC, DOCX, PPT Document Comparison with GroupDocs Comparison](http://groupdocs.com/apps/comparison)
4. [Online Document Management with GroupDocs Dashboard](http://groupdocs.com/apps/dashboard)
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
