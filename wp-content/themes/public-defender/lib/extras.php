<?php

/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
    return '&hellip; <a href="' . get_permalink() . '" title="Read the rest of this article" class="excerpt-permalink">' . __('Read more', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Limit length of auto-generated excerpts
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function roots_excerpt_length($length) {
  if (is_category()) {
    return $length;
  }
  else {
    return 30;
  }
}
add_filter('excerpt_length', 'roots_excerpt_length');

/**
 * Unregister core 'Post Tag' taxonomy.
 */
function roots_unregister_tag_taxonomy() {
  register_taxonomy('post_tag', array());
}
add_action('init', 'roots_unregister_tag_taxonomy');

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

/**
 * Get the 'site section' for the current page.
 * Returns either 'advocates' or 'solicitors',
 * or false if on an unknown page.
 *
 * @return string|false
 */
function get_site_section() {
    $breadcrumbs = new Roots_Breadcrumbs();
    $trail = $breadcrumbs->get_trail();

    if (count($trail) < 2 || get_class($trail[1]) !== 'WP_Post') {
        return false;
    }

    $page = $trail[1];
    if ($page->post_name == 'advocates') {
        return 'advocates';
    }
    else if ($page->post_name == 'solicitors') {
        return 'solicitors';
    }
    else {
        return false;
    }
}

/**
 * Retrieve advocates by their type for use on the 'Our Advocates' page template.
 *
 * @param array $types
 * @param array $exclude_types
 *
 * @return array
 */
function get_our_advocates_by_type($types, $exclude_types = array()) {
    $args = array(
        'posts_per_page'  => - 1,
        'post_type'       => 'advocate',
        'orderby' => array(
            'advocate-call' => 'ASC',
            'advocate-surname' => 'ASC',
        ),
        'meta_query'      => array(
            array(
                'key'     => 'advocate-call',
                'type'    => 'NUMERIC',
                'value'   => '',
                'compare' => 'LIKE'
            ),
            array(
                'key'     => 'advocate-surname',
                'value'   => '',
                'compare' => 'LIKE'
            )
        ),
        'tax_query'       => array()
    );

    $args['tax_query'][] = array(
        'taxonomy' => 'advocate-type',
        'field'    => 'slug',
        'terms'    => $types,
    );

    if (!empty($exclude_types)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'advocate-type',
            'field'    => 'slug',
            'operator' => 'NOT IN',
            'terms'    => $exclude_types,
        );
    }

    $advocate_posts = new WP_Query($args);
    $advocates = array();

    while ($advocate_posts->have_posts()) {
        $advocate_posts->the_post();

        // Hide advocates that have no photo
        if (!has_post_thumbnail()) {
            continue;
        }

        $name = get_the_title();

        $image_id = get_post_thumbnail_id();
        $image    = acf_get_attachment($image_id);

        $cv = get_field('advocate-cv');
        if ($cv) {
            $profile_link = $cv['url'];
        } else {
            $profile_link = false;
        }

        $summary = get_field('advocate-brief');
        if (empty($summary)) {
            $summary = false;
        }

        $advocates[] = array(
            'name' => $name,
            'image' => $image,
            'profile_link' => $profile_link,
            'summary' => $summary,
            'post' => get_post(),
        );
    }

    wp_reset_postdata();

    return $advocates;
}
