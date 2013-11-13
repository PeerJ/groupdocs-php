###Change log for GroupDocs SDK

1.5.0 version

|| {color:#000000}{*}Class{*}{color}\\ || Method || Changes ||
| GetDocumentContentResponse \\ | \\ | added class \\ |
| GetDocumentContentResult \\ | \\ | added class \\ |
| GetInvoiceResult \\ | \\ | added class \\ |
| GetInvoicesResponse \\ | \\ | added class \\ |
| GetSubscriptionPlanUsageResponse \\ | \\ | added class \\ |
| GetSubscriptionPlanUsageResult \\ | \\ | added class \\ |
| Invoice \\ | \\ | added class \\ |
| SignatureSignDocumentStatusInfo \\ | | added&nbsp;class \\ |
| SignatureSignDocumentStatusInfo \\ | | added&nbsp;class \\ |
| SignatureSignDocumentStatusResult \\ | | added&nbsp;class \\ |
| SignatureVerifyDocumentResponse \\ | \\ | added class \\ |
| SignatureVerifyDocumentResult \\ | \\ | added class \\ |
| SubscriptionPlanUsageInfo \\ | \\ | added class \\ |
| DocApi \\ | GetDocumentContent \\ | added method |
| SharedApi \\ | LoginUser \\ | added method \\ |
| SignatureApi \\ | ModifySignatureField \\ | parameter 'String fieldId' renamed to 'String fieldGuid' |
| SignatureApi \\ | DeleteSignatureField \\ | parameter 'String fieldId' renamed to 'String fieldGuid' \\ |
| SignatureApi \\ | GetContacts \\ | type of parameter 'page' changed from 'String' to 'Integer'; \\
parameter 'String records' moved from position 6 to position 3 |
| SignatureApi \\ | ModifyContact \\ | parameter 'String contactId' renamed to 'String contactGuid' |
| SignatureApi \\ | DeleteContact \\ | parameter 'String contactId' renamed to 'String contactGuid' |
| SignatureApi \\ | ArchiveSignatureEnvelope \\ | parameter 'String envelopeId' renamed to 'String envelopeGuid' |
| SignatureApi \\ | GetEnvelopeAuditLogs \\ | parameter 'String envelopeId' renamed to 'String envelopeGuid' |
| SignatureApi \\ | CreateSignatureEnvelope \\ | parameter 'SignatureEnvelopeSettings body' moved from position 3 to position 6; \\
type of parameter 'Integer envelopeGuid' changed to 'String'; \\
type of parameter 'Integer documentGuid' changed to 'String'; \\
parameter 'String templateGuid' moved from position 6 to position 3; |
| SignatureApi \\ | DeclineEnvelope \\ | parameter 'String envelopeId' renamed to 'String envelopeGuid'; \\
parameter 'String recipientId' renamed to 'String recipientGuid' |
| SignatureApi \\ | DelegateEnvelopeRecipient \\ | parameter 'String envelopeId' renamed to 'String envelopeGuid'; \\
parameter '&nbsp;String recipientId' renamed to 'String recipientGuid' \\ |
| SignatureApi \\ | DeleteSignatureEnvelope \\ | parameter 'String envelopeId' renamed to 'String envelopeGuid' |
| SignatureApi \\ | AddSignatureEnvelopeDocument \\ | parameter 'String envelopeId' renamed to 'String envelopeGuid'; \\
parameter 'String documentId' renamed to 'String documentGuid' |
| SignatureApi \\ | GetSignedEnvelopeDocument \\ | parameter 'String envelopeId' renamed to 'String envelopeGuid'; \\
parameter 'String documentId' renamed to 'String documentGuid' |
| SignatureApi \\ | DeleteSignatureEnvelopeDocument \\ | parameter 'String envelopeId' renamed to 'String envelopeGuid'; \\
parameter 'String documentId' renamed to 'String documentGuid' |
| SignatureApi \\ | GetSignatureEnvelopeDocuments \\ | parameter 'String envelopeId' renamed to 'String envelopeGuid' |
| SignatureApi \\ | GetSignedEnvelopeDocuments \\ | parameter 'String envelopeId' renamed to 'String envelopeGuid' |
| SignatureApi \\ | AddSignatureEnvelopeField \\ | parameter 'String envelopeId' renamed to 'String envelopeGuid'; \\
parameter 'String documentId' renamed to 'String documentGuid'; \\
parameter 'String recipientId' renamed to 'String recipientGuid'; \\
parameter 'String fieldId' renamed to 'String fieldGuid'; |
| | | |
| | Coming soon\! | |
| | | |
| | | |
| SystemApi | GetInvoices | added method |
| SystemApi | GetSubscriptionPlanUsage | added method |
| DatasourceField | | added field 'List<DatasourceField> nested_fields' |
| QuestionnaireInfo \\ | | added field 'Integer allowed_operations' |
| QuestionnaireMetadata | | added field 'Integer allowed_operations' |
| SignatureEnvelopeInfo | | added field 'String updatedDateTime' |
| SignatureFormParticipantInfo | | added field 'Integer status' |
| SignatureSignDocumentResult | | field 'String documentId' renamed to 'String jobId' |
| SignatureTemplateInfo | | added field 'Double fieldsCount' |
| StorageProviderInfo | | added field 'String syncOptions' |
| UserInfo | | added field 'Boolean is_annotation_document_name_shown'; \\
added field 'Boolean is_viewer_document_name_shown'; \\
added field 'Boolean signature_watermark_enabled'; \\
added field 'Boolean signature_desktop_notifications'; \\
added field 'Integer webhook_notification_retries'; \\
added field 'String webhook_notification_failed_recipients' |


1.6.0 version

|| Class || Method || Changes ||
| DocApi \\ | ViewDocument \\ | Added parameter 'String passwordSalt' (last position) |
| DocApi \\ | ViewDocumentAsHtml \\ | Added parameter 'String passwordSalt'&nbsp;(last position) |
| DocApi \\ | SetDocumentPassword \\ | New method |
| DocApi \\ | GetDocumentPageHtmlFixed \\ | New method \\ |
| SharedApi \\ | GetHtml \\ | New method \\ |
| SignatureApi \\ | CreateSignatureEnvelope \\ | Added parameter 'Boolean parseFields' (position 6) |
| SignatureApi \\ | AddSignatureEnvelopeDocument \\ | Added parameter 'Boolean parseFields'&nbsp;(last position) |
| SignatureApi \\ | GetSignatureEnvelopes \\ | Parameter 'String date' moved from pos 5 to pos 7; parameter 'String name' moved from pos 6 to pos 8; parameter 'String document' renamed to 'String originalDocumentMD5' and moved from pos 7 to pos 5; parameter 'String recipient' renamed to 'String recipientEmail' and moved from pos 8 to pos 6; |
| SignatureApi \\ | RenameSignatureEnvelopeDocument \\ | New method \\ |
| SignatureApi \\ | CancelSignatureEnvelope \\ | New method \\ |
| SignatureApi \\ | AddSignatureFormDocument \\ | Added parameter 'Boolean parseFields'&nbsp;(last position) |
| SignatureApi \\ | PublishSignatureForm \\ | Added parameter 'FileStream body'&nbsp;(last position, required) |
| SignatureApi \\ | GetSignatureForms \\ | Parameter 'String date' moved from pos 5 to pos 6; parameter 'String name' moved from pos 6 to pos 7; parameter 'String documentGuid' renamed to 'String originalDocumentMD5' and moved from pos 7 to pos 5 |
| SignatureApi \\ | AddSignatureTemplateDocument \\ | Added parameter 'Boolean parseFields'&nbsp;(last position) |
| SignatureApi \\ | RenameSignatureTemplateDocument \\ | New method \\ |
| StorageApi | MoveFolder \\ | Parameter 'String Groupdocs_Copy' moved from pos 4 to pos 5; parameter 'String Groupdocs_Move' moved from pos 5 to pos 4; |
| SystemApi \\ | SimulateAssessForPricingPlan \\ | New method |
| SystemApi \\ | UpdateSubscriptionPlan \\ | Parameter 'String userCount' replaced to 'UpdateSubscriptionPlanInfo body' |
| SystemApi \\ | GetPurchseWizardInfo \\ | New method \\ |
| ConditionInfo \\ | \- | New class |
| SignatureSignDocumentsResponse \\ | \- | class 'SignatureSignDocumentsResponse' renamed to 'GetPurchaseWizardResponse' |
| QuestionInfo \\ | \- | Added field 'List<ConditionInfo> conditions' |
| QuestionnaireInfo \\ | \- | Added field 'List<String> formats' |
| SetDocumentPasswordResponse \\ | \- | New class |
| SetDocumentPasswordResult \\ | \- | New class \\ |
| SignatureEnvelopeAuditLogInfo \\ | \- | Added field 'Integer type' |
| SignatureEnvelopeFieldInfo \\ | \- | Added field 'String guidanceText' |
| SignatureEnvelopeFieldSettings \\ | \- | Added field 'String guidanceText' |
| SignatureEnvelopeInfo \\ | \- | Added field 'Boolean canBeCommented' |
| SignatureEnvelopeInfo \\ | \- | Added field 'Boolean inPersonSign' |
| SignatureEnvelopeSettings \\ | \- | Added field 'Boolean canBeCommented' |
| SignatureEnvelopeSettings \\ | \- | Added field 'Boolean inPersonSign' |
| SignatureFieldInfo \\ | \- | Added field 'Integer minGraphSizeW' |
| SignatureFieldInfo \\ | \- | Added field 'Integer minGraphSizeH' |
| SignatureFormFieldInfo \\ | \- | Added field 'String guidanceText' |
| SignatureFormFieldSettings \\ | \- | Added field 'String guidanceText' |
| SignatureFormInfo \\ | \- | Added field 'Boolean notifyOwnerOnSign' |
| SignatureFormInfo \\ | \- | Added field 'Boolean attachSignedDocument' |
| SignatureFormSettings \\ | \- | Added field 'Boolean notifyOwnerOnSign' |
| SignatureFormSettings \\ | \- | Added field 'Boolean attachSignedDocument' |
| SignatureSignDocumentResult \\ | \- | Field 'List<SignatureSignDocumentInfo> documents' replaced to 'String jobId' |
| SignatureTemplateFieldInfo \\ | \- | Added field 'String guidanceText' |
| SignatureTemplateFieldSettings \\ | \- | Added field 'String guidanceText' |
| SignatureVerifyDocumentResult \\ | \- | Added field 'List<String> datesSigned' |
| SignatureVerifyDocumentResult \\ | \- | Added field 'List<String> references' |
| SignatureVerifyDocumentResult \\ | \- | Added field 'List<SignatureEnvelopeRecipientInfo> recipients' |
| SubscriptionPlanInfo \\ | \- | Added field 'String promoCode' |
| SignatureSignDocumentsResult \\ | \- | Class deleted |
| UpdateSubscriptionPlanInfo \\ | \- | New class |
| UserInfo \\ | \- | Field 'Object photo' replaced to 'List<Integer> photo' |
| UserInfo \\ | \- | Added field 'List<Integer> annotation_navigation_icons' |
| UserInfo \\ | \- | Added field 'List<Integer> annotation_tool_icons' |
| UserInfo \\ | \- | Added field 'Integer annotation_background_color' |
| UserInfo \\ | \- | Added field 'Boolean isviewer_right_mouse_button_menu_enabled' |
| UserInfo \\ | \- | Added field 'String signature_color' |
| ViewDocumentResult | \- | Added field 'String password' |


1.7.0 version
|| Class || Method || Changes ||
| GetTermSuggestionsResponse \\ | \- | New class \\ |
| GetTermSuggestionsResult | \- | New class |
| PublicSignatureSignDocumentSignerSettings \\ | \- | Renamed to PublicSignatureSignDocumentSignerSettingsInfo \\ |
| RevokeResponse \\ | \- | New class \\ |
| RevokeResult \\ | \- | New class \\ |
| SignatureContactSettings \\ | \- | Renamed to SignatureContactSettingsInfo \\ |
| SignatureEnvelopeAssignFieldSettings \\ | \- | Renamed to SignatureEnvelopeAssignFieldSettingsInfo \\ |
| SignatureEnvelopeFieldLocationSettings \\ | \- | Renamed to SignatureEnvelopeFieldLocationSettingsInfo \\ |
| SignatureEnvelopeFieldSettings \\ | \- | Renamed to SignatureEnvelopeFieldSettingsInfo \\ |
| SignatureEnvelopeSettings \\ | \- | Renamed to SignatureEnvelopeSettingsInfo \\ |
| SignatureFieldSettings \\ | \- | Renamed to SignatureFieldSettingsInfo \\ |
| SignatureFormDocumentSettingsInfo \\ | \- | New class \\ |
| SignatureFormFieldLocationSettings \\ | \- | Renamed to SignatureFormFieldLocationSettingsInfo \\ |
| SignatureFormFieldSettings \\ | \- | Renamed to SignatureFormFieldSettingsInfo \\ |
| SignatureFormSettings \\ | \- | Renamed to SignatureFormSettingsInfo \\ |
| SignaturePredefinedListSettings \\ | \- | Renamed to SignaturePredefinedListSettingsInfo \\ |
| SignatureSignDocumentDocumentSettings \\ | \- | Renamed to SignatureSignDocumentDocumentSettingsInfo \\ |
| SignatureSignDocumentSettings \\ | \- | Renamed to SignatureSignDocumentSettingsInfo \\ |
| SignatureSignDocumentSignerSettings \\ | \- | Renamed to SignatureSignDocumentSignerSettingsInfo \\ |
| SignatureSignatureSettings \\ | \- | Renamed to SignatureSignatureSettingsInfo \\ |
| SignatureTemplateAssignFieldSettings \\ | \- | Renamed to SignatureTemplateAssignFieldSettingsInfo \\ |
| SignatureTemplateFieldLocationSettings \\ | \- | Renamed to SignatureTemplateFieldLocationSettingsInfo \\ |
| SignatureTemplateFieldSettings \\ | \- | Renamed to SignatureTemplateFieldSettingsInfo \\ |
| SignatureTemplateSettings \\ | \- | Renamed to SignatureTemplateSettingsInfo \\ |
| WebhookInfo \\ | \- | New class \\ |
| AsyncApi \\ | GetJob \\ | Method removed \\ |
| MgmtApi \\ | Revoke \\ | New method \\ |
| SignatureApi \\ | AddContact \\ | Parameter (2) type changed from SignatureContactSettings to SignatureContactSettingsInfo \\ |
| SignatureApi \\ | AddPredefinedList \\ | Parameter (2) type changed from SignaturePredefinedListSettings to SignaturePredefinedListSettingsInfo \\ |
| SignatureApi \\ | AddSignatureEnvelopeField \\ | Parameter (6) type changed from SignatureEnvelopeFieldSettings to SignatureEnvelopeFieldSettingsInfo \\ |
| SignatureApi \\ | AddSignatureFormField \\ | Parameter (5) type changed from SignatureFormFieldSettings to SignatureFormFieldSettingsInfo \\ |
| SignatureApi \\ | AddSignatureTemplateField \\ | Parameter (6) type changed from SignatureTemplateFieldSettings to SignatureTemplateFieldSettingsInfo \\ |
| SignatureApi \\ | AssignSignatureEnvelopeField \\ | Parameter (5) type changed from SignatureEnvelopeAssignFieldSettings to SignatureEnvelopeAssignFieldSettingsInfo \\ |
| SignatureApi \\ | AssignSignatureTemplateField \\ | Parameter (5) type changed from SignatureTemplateAssignFieldSettings to SignatureTemplateAssignFieldSettingsInfo \\ |
| SignatureApi \\ | CreateSignature \\ | Parameter (3) type changed from SignatureSignatureSettings to SignatureSignatureSettingsInfo \\ |
| SignatureApi \\ | CreateSignatureEnvelope \\ | Parameter (7) type changed from SignatureEnvelopeSettings to SignatureEnvelopeSettingsInfo \\ |
| SignatureApi \\ | CreateSignatureField \\ | Parameter (2) type changed from SignatureFieldSettings to SignatureFieldSettingsInfo \\ |
| SignatureApi \\ | CreateSignatureForm \\ | Parameter (6) type changed from SignatureFormSettings to SignatureFormSettingsInfo \\ |
| SignatureApi \\ | CreateSignatureTemplate \\ | Parameter (5) type changed from SignatureTemplateSettings to SignatureTemplateSettingsInfo \\ |
| SignatureApi \\ | GetSignatureEnvelopeFieldData \\ | New method \\ |
| SignatureApi \\ | ImportContacts \\ | Parameter (2) type changed from List<SignatureContactSettings> to List<SignatureContactSettingsInfo> \\ |
| SignatureApi \\ | ModifyContact \\ | Parameter (3) type changed from SignatureContactSettings to SignatureContactSettingsInfo \\ |
| SignatureApi \\ | ModifySignatureEnvelope \\ | Parameter (3) type changed from SignatureEnvelopeSettings to SignatureEnvelopeSettingsInfo \\ |
| SignatureApi \\ | ModifySignatureEnvelopeField \\ | Parameter (5) type changed from SignatureEnvelopeFieldSettings to SignatureEnvelopeFieldSettingsInfo \\ |
| SignatureApi \\ | ModifySignatureEnvelopeFieldLocation \\ | Parameter (7) type changed from SignatureEnvelopeFieldLocationSettings to SignatureEnvelopeFieldLocationSettingsInfo \\ |
| SignatureApi \\ | ModifySignatureField \\ | Parameter (3) type changed from SignatureFieldSettings to SignatureFieldSettingsInfo \\ |
| SignatureApi \\ | ModifySignatureForm \\ | Parameter (3) type changed from SignatureFormSettings to SignatureFormSettingsInfo \\ |
| SignatureApi \\ | ModifySignatureFormDocument \\ | New method \\ |
| SignatureApi \\ | ModifySignatureFormField \\ | Parameter (5) type changed from SignatureFormFieldSettings to SignatureFormFieldSettingsInfo \\ |
| SignatureApi \\ | ModifySignatureFormFieldLocation \\ | Parameter (6) type changed from SignatureFormFieldLocationSettings to SignatureFormFieldLocationSettingsInfo \\ |
| SignatureApi \\ | ModifySignatureTemplate \\ | Parameter (3) type changed from SignatureTemplateSettings to SignatureTemplateSettingsInfo \\ |
| SignatureApi \\ | ModifySignatureTemplateField \\ | Parameter (5) type changed from SignatureTemplateFieldSettings to SignatureTemplateFieldSettingsInfo \\ |
| SignatureApi \\ | ModifySignatureTemplateFieldLocation \\ | Parameter (7) type changed from SignatureTemplateFieldLocationSettings to SignatureTemplateFieldLocationSettingsInfo \\ |
| SignatureApi \\ | PublicSignDocument \\ | Parameter (2) type changed from PublicSignatureSignDocumentSignerSettings to PublicSignatureSignDocumentSignerSettingsInfo \\ |
| SignatureApi \\ | PublishSignatureForm \\ | Parameter (3) type changed from FileStream to WebhookInfo; now 'body' parameter is not required \\ |
| SignatureApi \\ | RenameSignatureFormDocument \\ | New method \\ |
| SignatureApi \\ | RetrySignEnvelope \\ | New method \\ |
| SignatureApi \\ | SignatureEnvelopeSend \\ | Parameter (3) type changed from FileStream to WebhookInfo; now 'body' parameter is not required \\ |
| SignatureApi \\ | SignDocument \\ | Parameter (2) type changed from SignatureSignDocumentSettings to SignatureSignDocumentSettingsInfo \\ |
| SystemApi \\ | GetTermSuggestions \\ | New method \\ |
| SignatureEnvelopeInfo \\ | ownerName \\ | New field \\ |
| SubscriptionPlanInfo \\ | nextAssesmentDate \\ | New field \\ |
| AddCollaboratorResult \\ | \- | Class deleted |
| | | |
| | | |
| | | |
| AdminApi \\ | \- | New API \\ |
| AdminApi \\ | \- | New method \\ |
| AdminApi \\ | \- | New method \\ |
| AdminApi \\ | \- | New method \\ |
| AdminApi \\ | \- | New method \\ |
| AdminApi \\ | \- | New method \\ |

1.7.3 version
|| {color:#333333}Class{color} || Method || Changes ||
| SignatureSignDocumentSignerSettingsInfo | \- | fields -   added new property |
| TemplateInfo | \- | size -   new property |
| TemplateInfo | \- | upload_time   - new property |
| PublicSignatureSignDocumentSignerSettingsInfo | \- | fields -   new property |
| SignatureDocumentFieldsResponse | \- | new class |
| SignatureDocumentFieldsResult | \- | new class |
| UploadRequestResult | \- | upload_time   - new property |
| \- | GetContacts | useAnd -   new parameter |
| \- | UpdateEnvelopeFromTemplate | new   method |
| \- | DeletePredefinedList | SignaturePredefinedListResponse - renamed to   SignaturePredefinedListsResponse |
| | CreateSignatureTemplate | name - parameter property changed from   "required=false" to "requierd=true" |
| | GetQuestionnaires | orderBy   - new parameter |
| | GetQuestionnaires | isAscending   - new parameter |
| | GetQuestionnaireCollectors | orderBy   - new parameter |
| | GetQuestionnaireCollectors | isAsc -   new parameter |
| | PublicGetDocumentFields | new   method |
| | CopyFileToTemplates | new   method |