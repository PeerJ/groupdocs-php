###Change log for GroupDocs SDK

1.6.0 version

<table class="confluenceTable"><tbody>
<tr>
<th class="confluenceTh"> Class </th>
<th class="confluenceTh"> Method </th>
<th class="confluenceTh"> Changes </th>
</tr>
<tr>
<td class="confluenceTd"> DocApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ViewDocument <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Added parameter 'String passwordSalt' (last position) </td>
</tr>
<tr>
<td class="confluenceTd"> DocApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ViewDocumentAsHtml <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Added parameter 'String passwordSalt'&nbsp;(last position) </td>
</tr>
<tr>
<td class="confluenceTd"> DocApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> SetDocumentPassword <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New method </td>
</tr>
<tr>
<td class="confluenceTd"> DocApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> GetDocumentPageHtmlFixed <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SharedApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> GetHtml <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> CreateSignatureEnvelope <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Added parameter 'Boolean parseFields' (position 6) </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> AddSignatureEnvelopeDocument <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Added parameter 'Boolean parseFields'&nbsp;(last position) </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> GetSignatureEnvelopes <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter 'String date' moved from pos 5 to pos 7; parameter 'String name' moved from pos 6 to pos 8; parameter 'String document' renamed to 'String originalDocumentMD5' and moved from pos 7 to pos 5; parameter 'String recipient' renamed to 'String recipientEmail' and moved from pos 8 to pos 6; </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> RenameSignatureEnvelopeDocument <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> CancelSignatureEnvelope<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New method<br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> AddSignatureFormDocument <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Added parameter 'Boolean parseFields'&nbsp;(last position) </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> PublishSignatureForm <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Added parameter 'FileStream body'&nbsp;(last position, required) </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> GetSignatureForms<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter 'String date' moved from pos 5 to pos 6; parameter 'String name' moved from pos 6 to pos 7; parameter 'String documentGuid' renamed to 'String originalDocumentMD5' and moved from pos 7 to pos 5 </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> AddSignatureTemplateDocument <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Added parameter 'Boolean parseFields'&nbsp;(last position) </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> RenameSignatureTemplateDocument<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New method<br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> StorageApi </td>
<td class="confluenceTd"> MoveFolder<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter 'String Groupdocs_Copy' moved from pos 4 to pos 5; parameter 'String Groupdocs_Move' moved from pos 5 to pos 4; </td>
</tr>
<tr>
<td class="confluenceTd"> SystemApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> SimulateAssessForPricingPlan <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New method </td>
</tr>
<tr>
<td class="confluenceTd"> SystemApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> UpdateSubscriptionPlan <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter 'String userCount' replaced to 'UpdateSubscriptionPlanInfo body' </td>
</tr>
<tr>
<td class="confluenceTd"> SystemApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> GetPurchseWizardInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> ConditionInfo<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New class </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureSignDocumentsResponse<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> class 'SignatureSignDocumentsResponse' renamed to 'GetPurchaseWizardResponse' </td>
</tr>
<tr>
<td class="confluenceTd"> QuestionInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'List&lt;ConditionInfo&gt; conditions' </td>
</tr>
<tr>
<td class="confluenceTd"> QuestionnaireInfo<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'List&lt;String&gt; formats' </td>
</tr>
<tr>
<td class="confluenceTd"> SetDocumentPasswordResponse<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New class </td>
</tr>
<tr>
<td class="confluenceTd"> SetDocumentPasswordResult<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New class<br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureEnvelopeAuditLogInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'Integer type' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureEnvelopeFieldInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'String guidanceText' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureEnvelopeFieldSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'String guidanceText' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureEnvelopeInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'Boolean canBeCommented' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureEnvelopeInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'Boolean inPersonSign' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureEnvelopeSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'Boolean canBeCommented' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureEnvelopeSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'Boolean inPersonSign' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureFieldInfo<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'Integer minGraphSizeW' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureFieldInfo<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'Integer minGraphSizeH' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureFormFieldInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'String guidanceText' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureFormFieldSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'String guidanceText' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureFormInfo<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'Boolean notifyOwnerOnSign' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureFormInfo<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'Boolean attachSignedDocument' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureFormSettings<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'Boolean notifyOwnerOnSign' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureFormSettings<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'Boolean attachSignedDocument' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureSignDocumentResult <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Field 'List&lt;SignatureSignDocumentInfo&gt; documents' replaced to 'String jobId' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureTemplateFieldInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'String guidanceText' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureTemplateFieldSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'String guidanceText' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureVerifyDocumentResult <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'List&lt;String&gt; datesSigned' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureVerifyDocumentResult <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'List&lt;String&gt; references' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureVerifyDocumentResult <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'List&lt;SignatureEnvelopeRecipientInfo&gt; recipients' </td>
</tr>
<tr>
<td class="confluenceTd"> SubscriptionPlanInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'String promoCode' </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureSignDocumentsResult<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Class deleted </td>
</tr>
<tr>
<td class="confluenceTd"> UpdateSubscriptionPlanInfo<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New class </td>
</tr>
<tr>
<td class="confluenceTd"> UserInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Field 'Object photo' replaced to 'List&lt;Integer&gt; photo' </td>
</tr>
<tr>
<td class="confluenceTd"> UserInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'List&lt;Integer&gt; annotation_navigation_icons' </td>
</tr>
<tr>
<td class="confluenceTd"> UserInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'List&lt;Integer&gt; annotation_tool_icons' </td>
</tr>
<tr>
<td class="confluenceTd"> UserInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'Integer annotation_background_color' </td>
</tr>
<tr>
<td class="confluenceTd"> UserInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'Boolean isviewer_right_mouse_button_menu_enabled' </td>
</tr>
<tr>
<td class="confluenceTd"> UserInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'String signature_color' </td>
</tr>
<tr>
<td class="confluenceTd"> ViewDocumentResult </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Added field 'String password' </td>
</tr>
<tr>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd">&nbsp;</td>
</tr>
</tbody></table>


1.7.0 version
<table class="confluenceTable"><tbody>
<tr>
<th class="confluenceTh"> Class </th>
<th class="confluenceTh"> Method </th>
<th class="confluenceTh"> Changes </th>
</tr>
<tr>
<td class="confluenceTd"> GetTermSuggestionsResponse <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New class <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> GetTermSuggestionsResult </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New class </td>
</tr>
<tr>
<td class="confluenceTd"> PublicSignatureSignDocumentSignerSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to PublicSignatureSignDocumentSignerSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> RevokeResponse <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New class <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> RevokeResult <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New class <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureContactSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureContactSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureEnvelopeAssignFieldSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureEnvelopeAssignFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureEnvelopeFieldLocationSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureEnvelopeFieldLocationSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureEnvelopeFieldSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureEnvelopeFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureEnvelopeSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureEnvelopeSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureFieldSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureFormDocumentSettingsInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New class <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureFormFieldLocationSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureFormFieldLocationSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureFormFieldSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureFormFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureFormSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureFormSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignaturePredefinedListSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignaturePredefinedListSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureSignDocumentDocumentSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureSignDocumentDocumentSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureSignDocumentSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureSignDocumentSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureSignDocumentSignerSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureSignDocumentSignerSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureSignatureSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureSignatureSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureTemplateAssignFieldSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureTemplateAssignFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureTemplateFieldLocationSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureTemplateFieldLocationSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureTemplateFieldSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureTemplateFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureTemplateSettings <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Renamed to SignatureTemplateSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> WebhookInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New class <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> AsyncApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> GetJob <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Method removed <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> MgmtApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Revoke <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> AddContact <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (2) type changed from SignatureContactSettings to SignatureContactSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> AddPredefinedList <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (2) type changed from SignaturePredefinedListSettings to SignaturePredefinedListSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> AddSignatureEnvelopeField <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (6) type changed from SignatureEnvelopeFieldSettings to SignatureEnvelopeFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> AddSignatureFormField <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (5) type changed from SignatureFormFieldSettings to SignatureFormFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> AddSignatureTemplateField <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (6) type changed from SignatureTemplateFieldSettings to SignatureTemplateFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> AssignSignatureEnvelopeField <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (5) type changed from SignatureEnvelopeAssignFieldSettings to SignatureEnvelopeAssignFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> AssignSignatureTemplateField <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (5) type changed from SignatureTemplateAssignFieldSettings to SignatureTemplateAssignFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> CreateSignature <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (3) type changed from SignatureSignatureSettings to SignatureSignatureSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> CreateSignatureEnvelope <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (7) type changed from SignatureEnvelopeSettings to SignatureEnvelopeSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> CreateSignatureField <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (2) type changed from SignatureFieldSettings to SignatureFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> CreateSignatureForm <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (6) type changed from SignatureFormSettings to SignatureFormSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> CreateSignatureTemplate <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (5) type changed from SignatureTemplateSettings to SignatureTemplateSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> GetSignatureEnvelopeFieldData <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ImportContacts <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (2) type changed from List&lt;SignatureContactSettings&gt; to List&lt;SignatureContactSettingsInfo&gt; <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ModifyContact <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (3) type changed from SignatureContactSettings to SignatureContactSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ModifySignatureEnvelope <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (3) type changed from SignatureEnvelopeSettings to SignatureEnvelopeSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ModifySignatureEnvelopeField <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (5) type changed from SignatureEnvelopeFieldSettings to SignatureEnvelopeFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ModifySignatureEnvelopeFieldLocation <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (7) type changed from SignatureEnvelopeFieldLocationSettings to SignatureEnvelopeFieldLocationSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ModifySignatureField <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (3) type changed from SignatureFieldSettings to SignatureFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ModifySignatureForm <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (3) type changed from SignatureFormSettings to SignatureFormSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ModifySignatureFormDocument <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ModifySignatureFormField <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (5) type changed from SignatureFormFieldSettings to SignatureFormFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ModifySignatureFormFieldLocation <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (6) type changed from SignatureFormFieldLocationSettings to SignatureFormFieldLocationSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ModifySignatureTemplate <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (3) type changed from SignatureTemplateSettings to SignatureTemplateSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ModifySignatureTemplateField <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (5) type changed from SignatureTemplateFieldSettings to SignatureTemplateFieldSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ModifySignatureTemplateFieldLocation <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (7) type changed from SignatureTemplateFieldLocationSettings to SignatureTemplateFieldLocationSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> PublicSignDocument <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (2) type changed from PublicSignatureSignDocumentSignerSettings to PublicSignatureSignDocumentSignerSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> PublishSignatureForm <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (3) type changed from FileStream to WebhookInfo; now 'body' parameter is not required <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> RenameSignatureFormDocument <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> RetrySignEnvelope <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> SignatureEnvelopeSend <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (3) type changed from FileStream to WebhookInfo; now 'body' parameter is not required <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> SignDocument <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> Parameter (2) type changed from SignatureSignDocumentSettings to SignatureSignDocumentSettingsInfo <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SystemApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> GetTermSuggestions <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureEnvelopeInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> ownerName <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New field <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> SubscriptionPlanInfo <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> nextAssesmentDate <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> New field <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> AddCollaboratorResult<br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> Class deleted </td>
</tr>
<tr>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd">&nbsp;</td>
</tr>
<tr>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd">&nbsp;</td>
</tr>
<tr>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd">&nbsp;</td>
</tr>
<tr>
<td class="confluenceTd"> AdminApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New API <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> AdminApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> AdminApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> AdminApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> AdminApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
<tr>
<td class="confluenceTd"> AdminApi <br class="atl-forced-newline"> </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> New method <br class="atl-forced-newline"> </td>
</tr>
</tbody></table>

1.7.3 version

<table class="confluenceTable"><tbody>
<tr>
<th class="confluenceTh"> <font color="#333333">Class</font> </th>
<th class="confluenceTh"> Method </th>
<th class="confluenceTh"> Changes </th>
</tr>
<tr>
<td class="confluenceTd"> SignatureSignDocumentSignerSettingsInfo </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> fields -   added new property </td>
</tr>
<tr>
<td class="confluenceTd"> TemplateInfo </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> size -   new property </td>
</tr>
<tr>
<td class="confluenceTd"> TemplateInfo </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> upload_time   - new property </td>
</tr>
<tr>
<td class="confluenceTd"> PublicSignatureSignDocumentSignerSettingsInfo </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> fields -   new property </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureDocumentFieldsResponse </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> new class </td>
</tr>
<tr>
<td class="confluenceTd"> SignatureDocumentFieldsResult </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> new class </td>
</tr>
<tr>
<td class="confluenceTd"> UploadRequestResult </td>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> upload_time   - new property </td>
</tr>
<tr>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> GetContacts </td>
<td class="confluenceTd"> useAnd -   new parameter </td>
</tr>
<tr>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> UpdateEnvelopeFromTemplate </td>
<td class="confluenceTd"> new   method </td>
</tr>
<tr>
<td class="confluenceTd"> - </td>
<td class="confluenceTd"> DeletePredefinedList </td>
<td class="confluenceTd"> SignaturePredefinedListResponse - renamed to   SignaturePredefinedListsResponse </td>
</tr>
<tr>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd"> CreateSignatureTemplate </td>
<td class="confluenceTd"> name - parameter property changed from   "required=false" to "requierd=true" </td>
</tr>
<tr>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd"> GetQuestionnaires </td>
<td class="confluenceTd"> orderBy   - new parameter </td>
</tr>
<tr>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd"> GetQuestionnaires </td>
<td class="confluenceTd"> isAscending   - new parameter </td>
</tr>
<tr>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd"> GetQuestionnaireCollectors </td>
<td class="confluenceTd"> orderBy   - new parameter </td>
</tr>
<tr>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd"> GetQuestionnaireCollectors </td>
<td class="confluenceTd"> isAsc -   new parameter </td>
</tr>
<tr>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd"> PublicGetDocumentFields </td>
<td class="confluenceTd"> new   method </td>
</tr>
<tr>
<td class="confluenceTd">&nbsp;</td>
<td class="confluenceTd"> CopyFileToTemplates </td>
<td class="confluenceTd"> new   method </td>
</tr>
</tbody></table>