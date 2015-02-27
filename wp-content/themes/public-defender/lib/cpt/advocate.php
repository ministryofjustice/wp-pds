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
        'supports' => array('title', 'thumbnail'),
        'rewrite' => array(
            'slug'                => 'adv',
            'with_front'          => true,
            'pages'               => true,
            'feeds'               => true,
        )
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

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_cv',
        'title' => 'CV',
        'fields' => array (
            array (
                'key' => 'field_54f0344941a84',
                'label' => 'General',
                'name' => 'general',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'basic',
                'media_upload' => 'no',
            ),
            array (
                'key' => 'field_54f0345241a85',
                'label' => 'Advisory',
                'name' => 'advisory',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'basic',
                'media_upload' => 'no',
            ),
            array (
                'key' => 'field_54f0346441a86',
                'label' => 'Expertise',
                'name' => 'expertise',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_54f0346c41a87',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_54f0347141a88',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'basic',
                        'media_upload' => 'no',
                    ),
                ),
                'row_min' => 0,
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Add Row',
            ),
            array (
                'key' => 'field_54f0348741a89',
                'label' => 'Notable Cases',
                'name' => 'notable_cases',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_54f034ba41a8a',
                        'label' => 'Specialism',
                        'name' => 'specialism',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_54f034bd41a8b',
                        'label' => 'Cases',
                        'name' => 'cases',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'basic',
                        'media_upload' => 'no',
                    ),
                ),
                'row_min' => 0,
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Add Row',
            ),
            array (
                'key' => 'field_54f03e6499e85',
                'label' => 'Notes',
                'name' => 'notes',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'basic',
                'media_upload' => 'no',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'advocate',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

