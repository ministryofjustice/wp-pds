<?php
/**
 * Utility functions
 */
function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

// Tell WordPress to use searchform.php from the templates/ directory
function roots_get_search_form($form) {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', 'roots_get_search_form');

/**
 * Checks if the ACF field is empty.
 *
 * @param string $field_name
 * @param int|bool $post_id (optional)
 * @return bool
 */
function field_is_empty($field_name, $post_id = false) {
  $value = get_field($field_name, $post_id);
  return empty($value);
}

function debug($var) {
  if (WP_DEBUG) {
    echo '<pre>' . htmlspecialchars(print_r($var, true)) . '</pre>';
  }
}
