<?php

// Advocate CPT
function advocate_cpt_init() {
    $advocate_labels = array(
        'name' => 'Advocates',
        'singular_name' => 'Advocate',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Advocate',
        'edit_item' => 'Edit Advocate',
        'new_item' => 'New Advocate',
        'all_items' => 'All Advocates',
        'view_item' => 'View Advocate',
        'search_items' => 'Search Advocates',
        'not_found' => 'No advocates found',
        'not_found_in_trash' => 'No advocates found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Advocates'
    );
    $advocate_args = array(
        'labels' => $advocate_labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'query_var' => true,
        'exclude_from_search' => true,
        'rewrite' => true,
        'capabilities' => array(
            'publish_posts' => 'delete_others_posts',
            'edit_posts' => 'delete_others_posts',
            'edit_others_posts' => 'delete_others_posts',
            'delete_posts' => 'delete_others_posts',
            'delete_others_posts' => 'delete_others_posts',
            'read_private_posts' => 'delete_others_posts',
            'edit_post' => 'delete_others_posts',
            'delete_post' => 'delete_others_posts',
            'read_post' => 'delete_others_posts'
        ),
        'has_archive' => 'document',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail')
    );
    register_post_type('advocate', $advocate_args);
}

add_action('init', 'advocate_cpt_init');

function create_advocate_taxonomies() {
    // Advocate type
    $advocate_type_labels = array(
        'name' => _x('Advocate Type', 'taxonomy general name'),
        'singular_name' => _x('Advocate Type', 'taxonomy singular name'),
        'search_items' => __('Search Advocate Types'),
        'all_items' => __('All Advocate Types'),
        'parent_item' => __('Parent Advocate Type'),
        'parent_item_colon' => __('Parent Advocate Type:'),
        'edit_item' => __('Edit Advocate Type'),
        'update_item' => __('Update Advocate Type'),
        'add_new_item' => __('Add New Advocate Type'),
        'new_item_name' => __('New Advocate Type'),
        'menu_name' => __('Advocate Types'),
    );
    $advocate_type_args = array(
        'hierarchical' => true,
        'labels' => $advocate_type_labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'advocate', 'with_front' => false),
    );
    register_taxonomy('advocate-type', array('advocate'), $advocate_type_args);

    // Advocate specialism
    $advocate_specialism_labels = array(
        'name' => _x('Advocate Specialism', 'taxonomy general name'),
        'singular_name' => _x('Advocate Specialism', 'taxonomy singular name'),
        'search_items' => __('Search Advocate Specialisms'),
        'all_items' => __('All Advocate Specialisms'),
        'parent_item' => __('Parent Advocate Specialism'),
        'parent_item_colon' => __('Parent Advocate Specialism:'),
        'edit_item' => __('Edit Advocate Specialism'),
        'update_item' => __('Update Advocate Specialism'),
        'add_new_item' => __('Add New Advocate Specialism'),
        'new_item_name' => __('New Advocate Specialism'),
        'menu_name' => __('Advocate Specialisms'),
    );
    $advocate_specialism_args = array(
        'hierarchical' => true,
        'labels' => $advocate_specialism_labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'advocate', 'with_front' => false),
    );
    register_taxonomy('advocate-specialism', array('advocate'), $advocate_specialism_args);
}

add_action('init', 'create_advocate_taxonomies', 0);

// Rename Featured Image metabox
function advocate_image_box() {
    remove_meta_box('postimagediv', 'advocate', 'side');
    add_meta_box('postimagediv', __('Advocate picture'), 'post_thumbnail_meta_box', 'advocate', 'side', 'low');
}

add_action('do_meta_boxes', 'advocate_image_box');

function advocate_admin_order_by_surname( $query ){
    if (is_admin() && $query->get('post_type') == 'advocate') {
        if ($query->get('orderby') == '') {
            $query->set('orderby', 'advocate-surname');
            $query->set('meta_key', 'advocate-surname');
        }

        if ($query->get('order') == '') {
            $query->set('order', 'ASC');
        }
    }
}
add_action('pre_get_posts', 'advocate_admin_order_by_surname');
