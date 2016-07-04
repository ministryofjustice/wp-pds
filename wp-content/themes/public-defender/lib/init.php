<?php

require 'classes/moj-user-roles.php';

/**
 * Roots initial setup and constants
 */
function roots_setup() {
    // Make theme available for translation
    // Community translations can be found at https://github.com/roots/roots-translations
    load_theme_textdomain('roots', get_template_directory() . '/lang');

    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus(array(
        'primary_navigation_advocates' => __('Primary Navigation - Advocates', 'roots'),
        'primary_navigation_solicitors' => __('Primary Navigation - Solicitors', 'roots'),
        'primary_navigation_home' => __('Primary Navigation - Home', 'roots'),
    ));

    // Add post thumbnails
    // http://codex.wordpress.org/Post_Thumbnails
    // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support('post-thumbnails');

    // Add custom image sizes
    add_image_size('advocate_slide', 242, 190, true);
    add_image_size('advocate_slide_thumb', 160, 190, true);
    add_image_size('deep_link', 600, 400, true);

    // Add HTML5 markup for captions
    // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
    add_theme_support('html5', array('caption'));

    // Tell the TinyMCE editor to use a custom stylesheet
    add_editor_style('/assets/css/editor-style.css');

    // Add ACF options page
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page();
        acf_add_options_sub_page('Header');
    }
}

add_action('after_setup_theme', 'roots_setup');

/**
 * Define MOJ user roles
 */
new \MOJ_User_Roles();
