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

    $ancestors = get_post_ancestors($post->$pid);
    $root = count($ancestors) - 1;

    if (is_page() && (is_page($pid) || $post->post_parent == $pid || in_array($pid, $ancestors))) {
        return true;
    } else {
        return false;
    }
}
