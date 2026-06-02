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
    'title' => 'トップページ編集項目',
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
        'key' => 'field_riders_service_text',
        'label' => 'サービス本文',
        'name' => 'service_text',
        'type' => 'textarea',
        'rows' => 4,
        'new_lines' => '',
      ),
      array(
        'key' => 'field_riders_service_image',
        'label' => 'サービス画像',
        'name' => 'service_image',
        'type' => 'image',
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
      ),
      array(
        'key' => 'field_riders_event_tab',
        'label' => 'イベント',
        'name' => '',
        'type' => 'tab',
        'placement' => 'top',
      ),
      array(
        'key' => 'field_riders_camp_event_tag',
        'label' => 'キャンプイベント タグ',
        'name' => 'camp_event_tag',
        'type' => 'text',
      ),
      array(
        'key' => 'field_riders_camp_event_title',
        'label' => 'キャンプイベント 見出し',
        'name' => 'camp_event_title',
        'type' => 'text',
      ),
      array(
        'key' => 'field_riders_camp_event_text',
        'label' => 'キャンプイベント 本文',
        'name' => 'camp_event_text',
        'type' => 'textarea',
        'rows' => 4,
        'new_lines' => '',
      ),
      array(
        'key' => 'field_riders_camp_event_image',
        'label' => 'キャンプイベント 画像',
        'name' => 'camp_event_image',
        'type' => 'image',
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
      ),
      array(
        'key' => 'field_riders_touring_event_tag',
        'label' => 'ツーリングイベント タグ',
        'name' => 'touring_event_tag',
        'type' => 'text',
      ),
      array(
        'key' => 'field_riders_touring_event_title',
        'label' => 'ツーリングイベント 見出し',
        'name' => 'touring_event_title',
        'type' => 'text',
      ),
      array(
        'key' => 'field_riders_touring_event_text',
        'label' => 'ツーリングイベント 本文',
        'name' => 'touring_event_text',
        'type' => 'textarea',
        'rows' => 4,
        'new_lines' => '',
      ),
      array(
        'key' => 'field_riders_touring_event_image',
        'label' => 'ツーリングイベント 画像',
        'name' => 'touring_event_image',
        'type' => 'image',
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
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
