<?php
/**
 * ACF fields used by the front page.
 */

if (!defined('ABSPATH')) {
  exit;
}

function riders_register_acf_front_page_fields() {
  if (!function_exists('acf_add_local_field_group')) {
    return;
  }

  acf_add_local_field_group(array(
    'key' => 'group_riders_front_page_fields',
    'title' => 'トップページ設定',
    'fields' => array(
      array(
        'key' => 'field_riders_service_tab',
        'label' => '今月のサービス',
        'name' => '',
        'type' => 'tab',
        'placement' => 'top',
      ),
      array(
        'key' => 'field_riders_service_title',
        'label' => 'サービス見出し',
        'name' => 'service_title',
        'type' => 'text',
      ),
      array(
        'key' => 'field_riders_service_class_description',
        'label' => 'サービス説明文',
        'name' => 'service_class_description',
        'type' => 'textarea',
        'rows' => 4,
        'new_lines' => '',
      ),
      array(
        'key' => 'field_riders_service_class_image',
        'label' => 'サービス画像',
        'name' => 'service_class_image',
        'type' => 'image',
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
      ),
      array(
        'key' => 'field_riders_event_tab',
        'label' => 'RIDE & CAMP 画像',
        'name' => '',
        'type' => 'tab',
        'placement' => 'top',
      ),
      array(
        'key' => 'field_riders_event_image_1',
        'label' => 'キャンプイベント画像',
        'name' => 'event_image_1',
        'type' => 'image',
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
      ),
      array(
        'key' => 'field_riders_event_text_1',
        'label' => 'キャンプイベント 説明文',
        'name' => 'event_text_1',
        'type' => 'textarea',
        'rows' => 4,
        'new_lines' => '',
      ),
      array(
        'key' => 'field_riders_event_image_2',
        'label' => 'ツーリングイベント画像',
        'name' => 'event_image_2',
        'type' => 'image',
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
      ),
      array(
        'key' => 'field_riders_event_text_2',
        'label' => 'ツーリングイベント 説明文',
        'name' => 'event_text_2',
        'type' => 'textarea',
        'rows' => 4,
        'new_lines' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page_type',
          'operator' => '==',
          'value' => 'front_page',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => true,
    'show_in_rest' => 0,
  ));
}
add_action('acf/init', 'riders_register_acf_front_page_fields');
