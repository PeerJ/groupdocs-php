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
 *
 * NOTE: This class is auto generated by the swagger code generator program. Do not edit the class manually.
 *
 */
class UserInfo {

  static $swaggerTypes = array(
      'nickname' => 'string',
      'firstname' => 'string',
      'lastname' => 'string',
      'pkey' => 'string',
      'pswd_salt' => 'string',
      'claimed_id' => 'string',
      'token' => 'string',
      'storage' => 'int',
      'photo' => 'array[int]',
      'active' => 'bool',
      'trial' => 'bool',
      'news_eanbled' => 'bool',
      'alerts_eanbled' => 'bool',
      'support_eanbled' => 'bool',
      'support_email' => 'string',
      'annotation_branded' => 'bool',
      'viewer_branded' => 'bool',
      'is_real_time_broadcast_enabled' => 'bool',
      'is_scroll_broadcast_enabled' => 'bool',
      'is_zoom_broadcast_enabled' => 'bool',
      'annotation_logo' => 'array[int]',
      'pointer_tool_cursor' => 'array[int]',
      'annotation_header_options' => 'int',
      'is_annotation_navigation_widget_enabled' => 'bool',
      'is_annotation_zoom_widget_enabled' => 'bool',
      'is_annotation_download_widget_enabled' => 'bool',
      'is_annotation_print_widget_enabled' => 'bool',
      'is_annotation_help_widget_enabled' => 'bool',
      'is_right_panel_enabled' => 'bool',
      'is_thumbnails_panel_enabled' => 'bool',
      'is_standard_header_always_shown' => 'bool',
      'is_toolbar_enabled' => 'bool',
      'is_text_annotation_button_enabled' => 'bool',
      'is_rectangle_annotation_button_enabled' => 'bool',
      'is_point_annotation_button_enabled' => 'bool',
      'is_strikeout_annotation_button_enabled' => 'bool',
      'is_polyline_annotation_button_enabled' => 'bool',
      'is_typewriter_annotation_button_enabled' => 'bool',
      'is_watermark_annotation_button_enabled' => 'bool',
      'is_annotation_document_name_shown' => 'bool',
      'viewer_logo' => 'array[int]',
      'viewer_options' => 'int',
      'is_viewer_navigation_widget_enabled' => 'bool',
      'is_viewer_zoom_widget_enabled' => 'bool',
      'is_viewer_download_widget_enabled' => 'bool',
      'is_viewer_print_widget_enabled' => 'bool',
      'is_viewer_help_widget_enabled' => 'bool',
      'is_viewer_document_name_shown' => 'bool',
      'signedupOn' => 'string',
      'signedinOn' => 'string',
      'signin_count' => 'int',
      'roles' => 'array[RoleInfo]',
      'signature_watermark_enabled' => 'bool',
      'signature_desktop_notifications' => 'bool',
      'webhook_notification_retries' => 'int',
      'webhook_notification_failed_recipients' => 'string',
      'id' => 'float',
      'guid' => 'string',
      'primary_email' => 'string'

    );

  public $nickname; // string
  public $firstname; // string
  public $lastname; // string
  public $pkey; // string
  public $pswd_salt; // string
  public $claimed_id; // string
  public $token; // string
  public $storage; // int
  public $photo; // array[int]
  public $active; // bool
  public $trial; // bool
  public $news_eanbled; // bool
  public $alerts_eanbled; // bool
  public $support_eanbled; // bool
  public $support_email; // string
  public $annotation_branded; // bool
  public $viewer_branded; // bool
  public $is_real_time_broadcast_enabled; // bool
  public $is_scroll_broadcast_enabled; // bool
  public $is_zoom_broadcast_enabled; // bool
  public $annotation_logo; // array[int]
  public $pointer_tool_cursor; // array[int]
  public $annotation_header_options; // int
  public $is_annotation_navigation_widget_enabled; // bool
  public $is_annotation_zoom_widget_enabled; // bool
  public $is_annotation_download_widget_enabled; // bool
  public $is_annotation_print_widget_enabled; // bool
  public $is_annotation_help_widget_enabled; // bool
  public $is_right_panel_enabled; // bool
  public $is_thumbnails_panel_enabled; // bool
  public $is_standard_header_always_shown; // bool
  public $is_toolbar_enabled; // bool
  public $is_text_annotation_button_enabled; // bool
  public $is_rectangle_annotation_button_enabled; // bool
  public $is_point_annotation_button_enabled; // bool
  public $is_strikeout_annotation_button_enabled; // bool
  public $is_polyline_annotation_button_enabled; // bool
  public $is_typewriter_annotation_button_enabled; // bool
  public $is_watermark_annotation_button_enabled; // bool
  public $is_annotation_document_name_shown; // bool
  public $viewer_logo; // array[int]
  public $viewer_options; // int
  public $is_viewer_navigation_widget_enabled; // bool
  public $is_viewer_zoom_widget_enabled; // bool
  public $is_viewer_download_widget_enabled; // bool
  public $is_viewer_print_widget_enabled; // bool
  public $is_viewer_help_widget_enabled; // bool
  public $is_viewer_document_name_shown; // bool
  public $signedupOn; // string
  public $signedinOn; // string
  public $signin_count; // int
  public $roles; // array[RoleInfo]
  public $signature_watermark_enabled; // bool
  public $signature_desktop_notifications; // bool
  public $webhook_notification_retries; // int
  public $webhook_notification_failed_recipients; // string
  public $id; // float
  public $guid; // string
  public $primary_email; // string
  }

