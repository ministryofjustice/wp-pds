<?php

/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}

add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
    if (is_feed()) {
        return $title;
    }

    $title .= get_bloginfo('name');

    return $title;
}

add_filter('wp_title', 'roots_wp_title', 10);

// Is page or child of page
function is_tree($pid) {
    global $post;

    if ($post) {
        $ancestors = get_post_ancestors($post->$pid);
        $root = count($ancestors) - 1;

        if (is_page() && (is_page($pid) || $post->post_parent == $pid || in_array($pid, $ancestors))) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/* Setup option tree */
add_filter('ot_theme_mode', '__return_true');
add_filter('ot_show_pages', '__return_false');
add_filter('ot_show_new_layout', '__return_false');
add_filter('ot_use_theme_options', '__return_false');

add_filter('ot_header_version_text', '__return_null');

//load_template( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );
require_once (trailingslashit(get_template_directory()) . 'option-tree/ot-loader.php');

/**
 * Meta Boxes
 */
load_template(trailingslashit(get_template_directory()) . 'lib/meta-boxes.php');

// Set image size
add_image_size('advocate_slide', 265, 190, true);
add_image_size('advocate_slide_thumb', 160, 190, true);

// Prevent default fields in optiontree listitem
add_filter( 'ot_list_item_settings', 'filter_ot_list_item_settings', 10, 2 );
function filter_ot_list_item_settings( $settings, $id ) {

  // Only remove settings from a specific option
  if ( in_array($id, array('solicitor-advocates','duty-solicitors','police-reps')) )
    return array();

  return $settings;

}