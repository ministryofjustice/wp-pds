<?php

// Location CPT
function location_cpt_init() {
    $location_labels = array(
        'name' => 'Locations',
        'singular_name' => 'Location',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Location',
        'edit_item' => 'Edit Location',
        'new_item' => 'New Location',
        'all_items' => 'All Locations',
        'view_item' => 'View Location',
        'search_items' => 'Search Locations',
        'not_found' => 'No locations found',
        'not_found_in_trash' => 'No locations found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Locations'
    );
    $location_args = array(
        'labels' => $location_labels,
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
        'supports' => array('title')
    );
    register_post_type('location', $location_args);
}

add_action('init', 'location_cpt_init');
