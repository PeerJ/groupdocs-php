<?php
/**
 *  Copyright 2011 Wordnik, Inc.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */
 
/**
 *
 * NOTE: This class is auto generated by the swagger code generator program. Do not edit the class manually.
 */

class MergeAPI {

	function __construct($apiClient) {
	  $this->apiClient = $apiClient;
	}


	/**
	 * Add job document datasource
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param jobId  Job id
   *  @param fileId  File GUID
   *  @param datasourceId  Datasource id
   *  
	 * @return AddDocumentDataSourceResponse {@link AddDocumentDataSourceResponse} 
	 * @throws APIException 
	 */

	 public function AddJobDocumentDataSource($userId, $jobId, $fileId, $datasourceId) {

		//parse inputs
		$resourcePath = "/merge/{userId}/jobs/{jobId}/files/{fileId}/datasources/{datasourceId}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "PUT";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($jobId !== null) {
			$resourcePath = str_replace("{jobId}", $jobId, $resourcePath);
		}
		if($fileId !== null) {
			$resourcePath = str_replace("{fileId}", $fileId, $resourcePath);
		}
		if($datasourceId !== null) {
			$resourcePath = str_replace("{datasourceId}", $datasourceId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, null, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'AddDocumentDataSourceResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Add job document datasource fields
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param jobId  Job id
   *  @param fileId  File GUID
   *  @param postData  Fields
   *  
	 * @return AddDocumentDataSourceResponse {@link AddDocumentDataSourceResponse} 
	 * @throws APIException 
	 */

	 public function AddJobDocumentDataSourceFields($userId, $jobId, $fileId, $postData) {

		//parse inputs
		$resourcePath = "/merge/{userId}/jobs/{jobId}/files/{fileId}/datasources";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "PUT";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($jobId !== null) {
			$resourcePath = str_replace("{jobId}", $jobId, $resourcePath);
		}
		if($fileId !== null) {
			$resourcePath = str_replace("{fileId}", $fileId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $postData, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'AddDocumentDataSourceResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Merge datasource
	 *
	 * 
	 * 
   * @param mergeMergeInputFilesInputDatasourcesInput  
   *  
	 * @return MergeTemplateResponse {@link MergeTemplateResponse} 
	 * @throws APIException 
	 */

	 public function MergeDatasource($mergeMergeInputFilesInputDatasourcesInput) {

		//parse inputs
		$resourcePath = "/merge/{userId}/files/{fileId}/datasources/{datasourceId}?new_type={targetType}&email_results={emailResults}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "POST";
        $queryParams = array();
        $headerParams = array();
    
	
		
		if($mergeMergeInputFilesInputDatasourcesInput !== null && $mergeMergeInputFilesInputDatasourcesInput->userId !== null) {
		 	$resourcePath = str_replace("{userId}", $mergeMergeInputFilesInputDatasourcesInput->userId, $resourcePath);	
		}
		if($mergeMergeInputFilesInputDatasourcesInput !== null && $mergeMergeInputFilesInputDatasourcesInput->fileId !== null) {
		 	$resourcePath = str_replace("{fileId}", $mergeMergeInputFilesInputDatasourcesInput->fileId, $resourcePath);	
		}
		if($mergeMergeInputFilesInputDatasourcesInput !== null && $mergeMergeInputFilesInputDatasourcesInput->datasourceId !== null) {
		 	$resourcePath = str_replace("{datasourceId}", $mergeMergeInputFilesInputDatasourcesInput->datasourceId, $resourcePath);	
		}
		if($mergeMergeInputFilesInputDatasourcesInput !== null && $mergeMergeInputFilesInputDatasourcesInput->targetType !== null) {
		 	$resourcePath = str_replace("{targetType}", $mergeMergeInputFilesInputDatasourcesInput->targetType, $resourcePath);	
		}
		if($mergeMergeInputFilesInputDatasourcesInput !== null && $mergeMergeInputFilesInputDatasourcesInput->emailResults !== null) {
		 	$resourcePath = str_replace("{emailResults}", $mergeMergeInputFilesInputDatasourcesInput->emailResults, $resourcePath);	
		}

	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, null, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'MergeTemplateResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Merge datasource fields
	 *
	 * 
	 * 
   * @param postData  Fields
   *  @param mergeMergeInputFilesInput  
   *  
	 * @return MergeTemplateResponse {@link MergeTemplateResponse} 
	 * @throws APIException 
	 */

	 public function MergeDatasourceFields($postData, $mergeMergeInputFilesInput) {

		//parse inputs
		$resourcePath = "/merge/{userId}/files/{fileId}/datasources?new_type={targetType}&email_results={emailResults}&assembly_name={assemblyName}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "POST";
        $queryParams = array();
        $headerParams = array();
    
	
		
		if($mergeMergeInputFilesInput !== null && $mergeMergeInputFilesInput->userId !== null) {
		 	$resourcePath = str_replace("{userId}", $mergeMergeInputFilesInput->userId, $resourcePath);	
		}
		if($mergeMergeInputFilesInput !== null && $mergeMergeInputFilesInput->fileId !== null) {
		 	$resourcePath = str_replace("{fileId}", $mergeMergeInputFilesInput->fileId, $resourcePath);	
		}
		if($mergeMergeInputFilesInput !== null && $mergeMergeInputFilesInput->targetType !== null) {
		 	$resourcePath = str_replace("{targetType}", $mergeMergeInputFilesInput->targetType, $resourcePath);	
		}
		if($mergeMergeInputFilesInput !== null && $mergeMergeInputFilesInput->emailResults !== null) {
		 	$resourcePath = str_replace("{emailResults}", $mergeMergeInputFilesInput->emailResults, $resourcePath);	
		}
		if($mergeMergeInputFilesInput !== null && $mergeMergeInputFilesInput->assemblyName !== null) {
		 	$resourcePath = str_replace("{assemblyName}", $mergeMergeInputFilesInput->assemblyName, $resourcePath);	
		}

	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $postData, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'MergeTemplateResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Get questionnaire
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param questionnaireId  Questionnaire id
   *  
	 * @return GetQuestionnaireResponse {@link GetQuestionnaireResponse} 
	 * @throws APIException 
	 */

	 public function GetQuestionnaire($userId, $questionnaireId) {

		//parse inputs
		$resourcePath = "/merge/{userId}/questionnaires/{questionnaireId}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "GET";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($questionnaireId !== null) {
			$resourcePath = str_replace("{questionnaireId}", $questionnaireId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, null, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'GetQuestionnaireResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Get questionnaires
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  
	 * @return GetQuestionnairesResponse {@link GetQuestionnairesResponse} 
	 * @throws APIException 
	 */

	 public function GetQuestionnaires($userId) {

		//parse inputs
		$resourcePath = "/merge/{userId}/questionnaires";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "GET";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, null, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'GetQuestionnairesResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Create questionnaire
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param postData  Questionnaire
   *  
	 * @return CreateQuestionnaireResponse {@link CreateQuestionnaireResponse} 
	 * @throws APIException 
	 */

	 public function CreateQuestionnaire($userId, $postData) {

		//parse inputs
		$resourcePath = "/merge/{userId}/questionnaires";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "POST";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $postData, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'CreateQuestionnaireResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Update questionnaire
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param questionnaireId  Questionnaire id
   *  @param postData  Questionnaire
   *  
	 * @return UpdateQuestionnaireResponse {@link UpdateQuestionnaireResponse} 
	 * @throws APIException 
	 */

	 public function UpdateQuestionnaire($userId, $questionnaireId, $postData) {

		//parse inputs
		$resourcePath = "/merge/{userId}/questionnaires/{questionnaireId}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "PUT";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($questionnaireId !== null) {
			$resourcePath = str_replace("{questionnaireId}", $questionnaireId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $postData, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'UpdateQuestionnaireResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Delete questionnaire
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param questionnaireId  Questionnaire id
   *  
	 * @return DeleteQuestionnaireResponse {@link DeleteQuestionnaireResponse} 
	 * @throws APIException 
	 */

	 public function DeleteQuestionnaire($userId, $questionnaireId) {

		//parse inputs
		$resourcePath = "/merge/{userId}/questionnaires/{questionnaireId}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "DELETE";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($questionnaireId !== null) {
			$resourcePath = str_replace("{questionnaireId}", $questionnaireId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, null, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'DeleteQuestionnaireResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Get document questionnaires
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param fileId  File GUID
   *  
	 * @return GetDocumentQuestionnairesResponse {@link GetDocumentQuestionnairesResponse} 
	 * @throws APIException 
	 */

	 public function GetDocumentQuestionnaires($userId, $fileId) {

		//parse inputs
		$resourcePath = "/merge/{userId}/files/{fileId}/questionnaires";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "GET";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($fileId !== null) {
			$resourcePath = str_replace("{fileId}", $fileId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, null, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'GetDocumentQuestionnairesResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Create document questionnaire
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param fileId  File GUID
   *  @param postData  Questionnaire
   *  
	 * @return AddDocumentQuestionnaireResponse {@link AddDocumentQuestionnaireResponse} 
	 * @throws APIException 
	 */

	 public function CreateDocumentQuestionnaire($userId, $fileId, $postData) {

		//parse inputs
		$resourcePath = "/merge/{userId}/files/{fileId}/questionnaires";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "POST";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($fileId !== null) {
			$resourcePath = str_replace("{fileId}", $fileId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $postData, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'AddDocumentQuestionnaireResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Add document questionnaire
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param fileId  File GUID
   *  @param questionnaireId  Questionnaire id
   *  
	 * @return AddDocumentQuestionnaireResponse {@link AddDocumentQuestionnaireResponse} 
	 * @throws APIException 
	 */

	 public function AddDocumentQuestionnaire($userId, $fileId, $questionnaireId) {

		//parse inputs
		$resourcePath = "/merge/{userId}/files/{fileId}/questionnaires/{questionnaireId}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "PUT";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($fileId !== null) {
			$resourcePath = str_replace("{fileId}", $fileId, $resourcePath);
		}
		if($questionnaireId !== null) {
			$resourcePath = str_replace("{questionnaireId}", $questionnaireId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, null, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'AddDocumentQuestionnaireResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Delete document questionnaire
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param fileId  File GUID
   *  @param questionnaireId  Questionnaire id
   *  
	 * @return DeleteDocumentQuestionnaireResponse {@link DeleteDocumentQuestionnaireResponse} 
	 * @throws APIException 
	 */

	 public function DeleteDocumentQuestionnaire($userId, $fileId, $questionnaireId) {

		//parse inputs
		$resourcePath = "/merge/{userId}/files/{fileId}/questionnaires/{questionnaireId}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "DELETE";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($fileId !== null) {
			$resourcePath = str_replace("{fileId}", $fileId, $resourcePath);
		}
		if($questionnaireId !== null) {
			$resourcePath = str_replace("{questionnaireId}", $questionnaireId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, null, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'DeleteDocumentQuestionnaireResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Add datasource
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param postData  Datasource
   *  
	 * @return AddDatasourceResponse {@link AddDatasourceResponse} 
	 * @throws APIException 
	 */

	 public function AddDataSource($userId, $postData) {

		//parse inputs
		$resourcePath = "/merge/{userId}/datasources";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "POST";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $postData, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'AddDatasourceResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Update datasource
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param datasourceId  Datasource id
   *  @param postData  Datasource
   *  
	 * @return AddDatasourceResponse {@link AddDatasourceResponse} 
	 * @throws APIException 
	 */

	 public function UpdateDataSource($userId, $datasourceId, $postData) {

		//parse inputs
		$resourcePath = "/merge/{userId}/datasources/{datasourceId}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "PUT";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($datasourceId !== null) {
			$resourcePath = str_replace("{datasourceId}", $datasourceId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $postData, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'AddDatasourceResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Update datasource fields
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param datasourceId  Datasource id
   *  @param postData  Datasource
   *  
	 * @return AddDatasourceResponse {@link AddDatasourceResponse} 
	 * @throws APIException 
	 */

	 public function UpdateDataSourceFields($userId, $datasourceId, $postData) {

		//parse inputs
		$resourcePath = "/merge/{userId}/datasources/{datasourceId}/fields";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "PUT";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($datasourceId !== null) {
			$resourcePath = str_replace("{datasourceId}", $datasourceId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $postData, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'AddDatasourceResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Delete datasource fields
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param datasourceId  Datasource id
   *  
	 * @return DeleteDatasourceResponse {@link DeleteDatasourceResponse} 
	 * @throws APIException 
	 */

	 public function DeleteDataSource($userId, $datasourceId) {

		//parse inputs
		$resourcePath = "/merge/{userId}/datasources/{datasourceId}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "DELETE";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($datasourceId !== null) {
			$resourcePath = str_replace("{datasourceId}", $datasourceId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, null, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'DeleteDatasourceResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Get datasource
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param datasourceId  Datasource id
   *  @param fields  Fields
   *  
	 * @return GetDatasourceResponse {@link GetDatasourceResponse} 
	 * @throws APIException 
	 */

	 public function GetDataSource($userId, $datasourceId, $fields) {

		//parse inputs
		$resourcePath = "/merge/{userId}/datasources/{datasourceId}?field={fields}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "GET";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($datasourceId !== null) {
			$resourcePath = str_replace("{datasourceId}", $datasourceId, $resourcePath);
		}
		if($fields !== null) {
			$resourcePath = str_replace("{fields}", $fields, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, null, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'GetDatasourceResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Get questionnaire datasources
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param questionnaireId  QuestionnaireId id
   *  @param includeFields  Include fields
   *  
	 * @return GetDatasourcesResponse {@link GetDatasourcesResponse} 
	 * @throws APIException 
	 */

	 public function GetQuestionnaireDataSources($userId, $questionnaireId, $includeFields) {

		//parse inputs
		$resourcePath = "/merge/{userId}/questionnaires/{questionnaireId}/datasources?include_fields={includeFields}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "GET";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($questionnaireId !== null) {
			$resourcePath = str_replace("{questionnaireId}", $questionnaireId, $resourcePath);
		}
		if($includeFields !== null) {
			$resourcePath = str_replace("{includeFields}", $includeFields, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, null, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'GetDatasourcesResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Add questionnaire execution
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param questionnaireId  Questionnaire id
   *  @param postData  Execution
   *  
	 * @return AddQuestionnaireExecutionResponse {@link AddQuestionnaireExecutionResponse} 
	 * @throws APIException 
	 */

	 public function AddQuestionnaireExecution($userId, $questionnaireId, $postData) {

		//parse inputs
		$resourcePath = "/merge/{userId}/questionnaires/{questionnaireId}/executions";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "POST";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($questionnaireId !== null) {
			$resourcePath = str_replace("{questionnaireId}", $questionnaireId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $postData, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'AddQuestionnaireExecutionResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Get questionnaire executions
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  
	 * @return GetQuestionnaireExecutionsResponse {@link GetQuestionnaireExecutionsResponse} 
	 * @throws APIException 
	 */

	 public function GetQuestionnaireExecutions($userId) {

		//parse inputs
		$resourcePath = "/merge/{userId}/questionnaires/executions";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "GET";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, null, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'GetQuestionnaireExecutionsResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Update questionnaire execution
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param executionId  Execution id
   *  @param postData  Execution
   *  
	 * @return UpdateQuestionnaireExecutionResponse {@link UpdateQuestionnaireExecutionResponse} 
	 * @throws APIException 
	 */

	 public function UpdateQuestionnaireExecution($userId, $executionId, $postData) {

		//parse inputs
		$resourcePath = "/merge/{userId}/questionnaires/executions/{executionId}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "PUT";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($executionId !== null) {
			$resourcePath = str_replace("{executionId}", $executionId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $postData, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'UpdateQuestionnaireExecutionResponse');
		return $responseObject;
				
				
	 }


	/**
	 * Update questionnaire execution status
	 *
	 * 
	 * 
   * @param userId  User GUID
   *  @param executionId  Execution id
   *  @param postData  Status
   *  
	 * @return UpdateQuestionnaireExecutionResponse {@link UpdateQuestionnaireExecutionResponse} 
	 * @throws APIException 
	 */

	 public function UpdateQuestionnaireExecutionStatus($userId, $executionId, $postData) {

		//parse inputs
		$resourcePath = "/merge/{userId}/questionnaires/executions/{executionId}/status";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$resourcePath = str_replace("*", "", $resourcePath);
		$method = "PUT";
        $queryParams = array();
        $headerParams = array();
    
		
		if($userId !== null) {
			$resourcePath = str_replace("{userId}", $userId, $resourcePath);
		}
		if($executionId !== null) {
			$resourcePath = str_replace("{executionId}", $executionId, $resourcePath);
		}

	
	

		//make the API Call
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $postData, $headerParams);
    if(! $response){
        return null;
    }

		//create output objects if the response has more than one object
		$responseObject = $this->apiClient->deserialize($response, 'UpdateQuestionnaireExecutionResponse');
		return $responseObject;
				
				
	 }



}