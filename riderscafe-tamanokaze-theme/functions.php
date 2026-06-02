<?php
/**
 * Theme functions.
 */

if (!defined('ABSPATH')) {
  exit;
}

function riderscafe_tamanokaze_setup() {
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
}
add_action('after_setup_theme', 'riderscafe_tamanokaze_setup');

function riderscafe_tamanokaze_assets() {
  $theme_uri = get_template_directory_uri();
  $theme_dir = get_template_directory();

  wp_enqueue_style(
    'riderscafe-tamanokaze-styles',
    $theme_uri . '/assets/css/styles.css',
    array(),
    filemtime($theme_dir . '/assets/css/styles.css')
  );

  wp_enqueue_script(
    'riderscafe-tamanokaze-script',
    $theme_uri . '/assets/js/script.js',
    array(),
    filemtime($theme_dir . '/assets/js/script.js'),
    true
  );
}
add_action('wp_enqueue_scripts', 'riderscafe_tamanokaze_assets');

require_once get_template_directory() . '/acf-section-fields.php';

function riders_get_acf_page_id() {
  $page_id = get_option('page_on_front');

  if (!$page_id) {
    $page_id = get_queried_object_id();
  }

  return $page_id;
}

function riders_get_acf_lookup_ids($page_id = null) {
  $lookup_ids = array();

  if ($page_id) {
    $lookup_ids[] = $page_id;
  }

  $front_page_id = get_option('page_on_front');

  if ($front_page_id) {
    $lookup_ids[] = $front_page_id;
  }

  $queried_id = get_queried_object_id();

  if ($queried_id) {
    $lookup_ids[] = $queried_id;
  }

  $lookup_ids[] = 'option';

  return array_values(array_unique($lookup_ids));
}

function riders_has_acf_value($value) {
  if (is_array($value)) {
    return !empty($value);
  }

  return $value !== null && $value !== false && $value !== '';
}

function riders_get_acf_value($field_names, $page_id = null, $default = '') {
  if (!function_exists('get_field')) {
    return $default;
  }

  foreach ((array) $field_names as $field_name) {
    foreach (riders_get_acf_lookup_ids($page_id) as $lookup_id) {
      $value = get_field($field_name, $lookup_id);

      if (riders_has_acf_value($value)) {
        return $value;
      }
    }
  }

  return $default;
}

function riders_get_acf_image_url($field_name, $page_id, $default_url = '') {
  if (!function_exists('get_field')) {
    return $default_url;
  }

  $image = riders_get_acf_value($field_name, $page_id);

  if (empty($image)) {
    return $default_url;
  }

  if (is_numeric($image)) {
    $url = wp_get_attachment_image_url((int) $image, 'full');
    return $url ? $url : $default_url;
  }

  if (is_string($image)) {
    return $image;
  }

  if (is_array($image) && !empty($image['url'])) {
    return $image['url'];
  }

  return $default_url;
}
