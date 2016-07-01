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

/**
 * Load a template part into a template
 *
 * Similar to the core WordPress function get_template_part(), but with
 * the option to pass additional variables to the template.
 *
 * @param string $template Slug of the template file to include
 * @param array $vars Variables to pass through to the template
 * @return void|WP_Error WP_Error is returned if the template could not be found
 */
function template_part($template, $vars = array()) {
  // Add global variables into the scope
  global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

  if ( is_array( $wp_query->query_vars ) ) {
    extract( $wp_query->query_vars, EXTR_SKIP );
  }

  if ( isset( $s ) ) {
    $s = esc_attr( $s );
  }

  // Add variables from $vars array into the scope
  extract($vars);

  // Locate and include the template file
  $located = locate_template("{$template}.php");
  if (!empty($located)) {
    include $located;
  }
  else {
    return new WP_Error("Unable to locate template '{$template}'");
  }
}

/**
 * Get all pages using the specified page template.
 *
 * @param string $template Name of the page template.
 * @param int $limit Number of pages to return. Default unlimited.
 * @return WP_Post[]
 */
function get_pages_by_template($template, $limit = -1) {
    $args = array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'posts_per_page' => $limit,
        'meta_key' => '_wp_page_template',
        'meta_value' => $template,
    );

    $query = new WP_Query($args);

    return $query->posts;
}

/**
 * Get one page using the specified page template.
 * Use this to get only one WP_Post object.
 *
 * @param string $template Name of the page template.
 * @return WP_Post
 */
function get_page_by_template($template) {
    $pages = get_pages_by_template($template, 1);
    return array_shift($pages);
}
