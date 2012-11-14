<?php
/**
 *  Copyright 2012 GroupDocs.
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
class AntApi {

	private $basePath = "https://api.groupdocs.com/v2.0";

	function __construct($apiClient) {
	  $this->apiClient = $apiClient;
	}

    public function setBasePath($basePath) {
	  $this->basePath = $basePath;
	}
	  
	public function getBasePath() {
	  $this->basePath;
	}

  /**
	 * CreateAnnotation
	 * Create annotation
   * userId, string: User GUID (required)
   * fileId, string: File ID (required)
   * body, AnnotationInfo: annotation (required)
   * @return CreateAnnotationResponse
	 */

   public function CreateAnnotation($userId, $fileId, $body) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/files/{fileId}/annotations");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "POST";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($fileId !== null) {
  			$resourcePath = str_replace("{" . "fileId" . "}",
  			                            $fileId, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'CreateAnnotationResponse');
  	  return $responseObject;
      }
  /**
	 * ListAnnotations
	 * Get list of annotations
   * userId, string: User GUID (required)
   * fileId, string: File ID (required)
   * @return ListAnnotationsResponse
	 */

   public function ListAnnotations($userId, $fileId) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/files/{fileId}/annotations");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "GET";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($fileId !== null) {
  			$resourcePath = str_replace("{" . "fileId" . "}",
  			                            $fileId, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'ListAnnotationsResponse');
  	  return $responseObject;
      }
  /**
	 * DeleteAnnotation
	 * Delete annotation
   * userId, string: User GUID (required)
   * annotationId, string: Annotation ID (required)
   * @return DeleteAnnotationResponse
	 */

   public function DeleteAnnotation($userId, $annotationId) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/annotations/{annotationId}");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "DELETE";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($annotationId !== null) {
  			$resourcePath = str_replace("{" . "annotationId" . "}",
  			                            $annotationId, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'DeleteAnnotationResponse');
  	  return $responseObject;
      }
  /**
	 * CreateAnnotationReply
	 * Create annotation reply
   * userId, string: User GUID (required)
   * annotationId, string: Annotation ID (required)
   * body, AnnotationReplyInfo: Reply (required)
   * @return AddReplyResponse
	 */

   public function CreateAnnotationReply($userId, $annotationId, $body) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/annotations/{annotationId}/replies");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "POST";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($annotationId !== null) {
  			$resourcePath = str_replace("{" . "annotationId" . "}",
  			                            $annotationId, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'AddReplyResponse');
  	  return $responseObject;
      }
  /**
	 * EditAnnotationReply
	 * Edit annotation reply
   * userId, string: User GUID (required)
   * replyGuid, string: Reply GUID (required)
   * body, string: Message (required)
   * @return EditReplyResponse
	 */

   public function EditAnnotationReply($userId, $replyGuid, $body) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/replies/{replyGuid}");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "PUT";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($replyGuid !== null) {
  			$resourcePath = str_replace("{" . "replyGuid" . "}",
  			                            $replyGuid, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'EditReplyResponse');
  	  return $responseObject;
      }
  /**
	 * DeleteAnnotationReply
	 * Delete annotation reply
   * userId, string: User GUID (required)
   * replyGuid, string: Reply GUID (required)
   * @return DeleteReplyResponse
	 */

   public function DeleteAnnotationReply($userId, $replyGuid) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/replies/{replyGuid}");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "DELETE";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($replyGuid !== null) {
  			$resourcePath = str_replace("{" . "replyGuid" . "}",
  			                            $replyGuid, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'DeleteReplyResponse');
  	  return $responseObject;
      }
  /**
	 * ListAnnotationReplies
	 * Get list of annotation replies
   * userId, string: User GUID (required)
   * annotationId, string: Annotation ID (required)
   * after, string: After (required)
   * @return ListRepliesResponse
	 */

   public function ListAnnotationReplies($userId, $annotationId, $after) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/annotations/{annotationId}/replies?after={after}");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "GET";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($annotationId !== null) {
  			$resourcePath = str_replace("{" . "annotationId" . "}",
  			                            $annotationId, $resourcePath);
  		}
  		if($after !== null) {
  			$resourcePath = str_replace("{" . "after" . "}",
  			                            $after, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'ListRepliesResponse');
  	  return $responseObject;
      }
  /**
	 * SetAnnotationCollaborators
	 * Set annotation collaborators
   * userId, string: User GUID (required)
   * fileId, string: File ID (required)
   * version, string: Annotation version (required)
   * body, List[string]: Collaborators (optional)
   * @return SetCollaboratorsResponse
	 */

   public function SetAnnotationCollaborators($userId, $fileId, $version, $body=null) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/files/{fileId}/version/{version}/collaborators");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "PUT";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($fileId !== null) {
  			$resourcePath = str_replace("{" . "fileId" . "}",
  			                            $fileId, $resourcePath);
  		}
  		if($version !== null) {
  			$resourcePath = str_replace("{" . "version" . "}",
  			                            $version, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'SetCollaboratorsResponse');
  	  return $responseObject;
      }
  /**
	 * GetAnnotationCollaborators
	 * Get list of annotation collaborators
   * userId, string: User GUID (required)
   * fileId, string: File ID (required)
   * @return GetCollaboratorsResponse
	 */

   public function GetAnnotationCollaborators($userId, $fileId) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/files/{fileId}/collaborators");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "GET";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($fileId !== null) {
  			$resourcePath = str_replace("{" . "fileId" . "}",
  			                            $fileId, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'GetCollaboratorsResponse');
  	  return $responseObject;
      }
  /**
	 * AddAnnotationCollaborator
	 * Add an annotation collaborator
   * userId, string: User GUID (required)
   * fileId, string: File ID (required)
   * body, ReviewerInfo: Reviewer Info (optional)
   * @return AddCollaboratorResponse
	 */

   public function AddAnnotationCollaborator($userId, $fileId, $body=null) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/files/{fileId}/collaborators");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "POST";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($fileId !== null) {
  			$resourcePath = str_replace("{" . "fileId" . "}",
  			                            $fileId, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'AddCollaboratorResponse');
  	  return $responseObject;
      }
  /**
	 * GetReviewerContacts
	 * Get list of reviewer contacts
   * userId, string: User GUID (required)
   * @return GetReviewerContactsResponse
	 */

   public function GetReviewerContacts($userId) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/contacts");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "GET";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'GetReviewerContactsResponse');
  	  return $responseObject;
      }
  /**
	 * SetReviewerContacts
	 * Get list of reviewer contacts
   * userId, string: User GUID (required)
   * @return GetReviewerContactsResponse
	 */

   public function SetReviewerContacts($userId) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/reviewerContacts");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "PUT";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'GetReviewerContactsResponse');
  	  return $responseObject;
      }
  /**
	 * MoveAnnotation
	 * Move annotation
   * userId, string: User GUID (required)
   * annotationId, string: Annotation ID (required)
   * body, Point: position (required)
   * @return MoveAnnotationResponse
	 */

   public function MoveAnnotation($userId, $annotationId, $body) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/annotations/{annotationId}/position");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "PUT";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($annotationId !== null) {
  			$resourcePath = str_replace("{" . "annotationId" . "}",
  			                            $annotationId, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'MoveAnnotationResponse');
  	  return $responseObject;
      }
  /**
	 * SetAnnotationAccess
	 * Set Annotation Access
   * userId, string: User GUID (required)
   * annotationId, string: Annotation ID (required)
   * body, int: Annotation Access (required)
   * @return SetAnnotationAccessResponse
	 */

   public function SetAnnotationAccess($userId, $annotationId, $body) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/annotations/{annotationId}/annotationAccess");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "PUT";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($annotationId !== null) {
  			$resourcePath = str_replace("{" . "annotationId" . "}",
  			                            $annotationId, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'SetAnnotationAccessResponse');
  	  return $responseObject;
      }
  /**
	 * MoveAnnotationMarker
	 * Move Annotation Marker
   * userId, string: User GUID (required)
   * annotationId, string: Annotation ID (required)
   * body, Point: position (required)
   * @return MoveAnnotationResponse
	 */

   public function MoveAnnotationMarker($userId, $annotationId, $body) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/annotations/{annotationId}/markerPosition");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "PUT";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($annotationId !== null) {
  			$resourcePath = str_replace("{" . "annotationId" . "}",
  			                            $annotationId, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'MoveAnnotationResponse');
  	  return $responseObject;
      }
  /**
	 * SetReviewerRights
	 * Set Reviewer Rights
   * userId, string: User GUID (required)
   * fileId, string: File ID (required)
   * body, List[ReviewerInfo]: Collaborators (required)
   * @return SetReviewerRightsResponse
	 */

   public function SetReviewerRights($userId, $fileId, $body) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/files/{fileId}/reviewerRights");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "PUT";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($fileId !== null) {
  			$resourcePath = str_replace("{" . "fileId" . "}",
  			                            $fileId, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'SetReviewerRightsResponse');
  	  return $responseObject;
      }
  /**
	 * SetSharedLinkAccessRights
	 * Set Shared Link Access Rights
   * userId, string: User GUID (required)
   * fileId, string: File ID (required)
   * body, int: Access Rights for the collaborate link (required)
   * @return SetSharedLinkAccessRightsResponse
	 */

   public function SetSharedLinkAccessRights($userId, $fileId, $body) {
  	  //parse inputs
  	  $resourcePath = str_replace("*", "", "/ant/{userId}/files/{fileId}/sharedLinkAccessRights");
  	  $resourcePath = str_replace("{format}", "json", $resourcePath);
  	  $method = "PUT";
      $queryParams = array();
      $headerParams = array();

      if($userId !== null) {
  			$resourcePath = str_replace("{" . "userId" . "}",
  			                            $userId, $resourcePath);
  		}
  		if($fileId !== null) {
  			$resourcePath = str_replace("{" . "fileId" . "}",
  			                            $fileId, $resourcePath);
  		}
  		//make the API Call
      if (! isset($body)) {
        $body = null;
      }
      $response = $this->apiClient->callAPI($this->basePath, $resourcePath, $method,
  		                                      $queryParams, $body, $headerParams);
      if(! $response){
        return null;
      }

  	  $responseObject = $this->apiClient->deserialize($response,
  		                                                'SetSharedLinkAccessRightsResponse');
  	  return $responseObject;
      }
  
}

