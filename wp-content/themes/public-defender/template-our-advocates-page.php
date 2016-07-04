<?php
/**
 * Template name: Our Advocates page
 */
the_post();
?>

<?php get_template_part('templates/page-header'); ?>

<?php the_content(); ?>

<section class="people-group">
    <h2>Head of Advocacy</h2>

    <div class="row">
        <?php

        $qc_advocates_args = array(
            'posts_per_page' => - 1,
            'post_type'      => 'advocate',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'advocate-type',
                    'field'    => 'slug',
                    'terms'    => 'head-of-advocacy'
                )
            )
        );

        $qc_advocates = new WP_Query($qc_advocates_args);

        while ($qc_advocates->have_posts()):
            $qc_advocates->the_post();
            ?>
            <div class="col-md-8">
                <div class="row">
                    <?php

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

                    $vars = compact('name', 'image', 'profile_link', 'summary');

                    template_part('templates/person/person-wide', $vars);

                    ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<section class="people-group">
    <h2>QCs</h2>

    <div class="row">
        <?php

        $qc_advocates_args = array(
            'posts_per_page' => - 1,
            'post_type'      => 'advocate',
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
            'meta_query'     => array(
                array(
                    'key'     => 'advocate-call',
                    'value'   => '',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'     => 'advocate-surname',
                    'value'   => '',
                    'compare' => 'LIKE'
                )
            ),
            'tax_query'      => array(
                array(
                    'taxonomy' => 'advocate-type',
                    'field'    => 'slug',
                    'terms'    => 'qc'
                ),
                array(
                    'taxonomy' => 'advocate-type',
                    'field'    => 'slug',
                    'operator' => 'NOT IN',
                    'terms'    => 'head-of-advocacy',
                )
            )
        );

        add_filter('posts_orderby', 'orderbyreplace');
        $qc_advocates = new WP_Query($qc_advocates_args);
        remove_filter('posts_orderby', 'orderbyreplace');

        $i = 1;
        while ($qc_advocates->have_posts()) {
            $qc_advocates->the_post();

            // Hide advocates that have no photo
            if ( ! has_post_thumbnail()) {
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

            $col_width = array(
                'md' => 2,
                'sm' => 3,
            );

            $vars = compact('name', 'image', 'profile_link', 'summary', 'col_width');

            template_part('templates/person/person-small', $vars);

            if ($i % 6 === 0) {
                echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
            }
            if ($i % 4 === 0) {
                echo '<div class="clearfix visible-sm-block"></div>';
            }
            if ($i % 2 === 0) {
                echo '<div class="clearfix visible-xs-block"></div>';
            }

            $i ++;
        }

        ?>
    </div>
</section>

<section class="people-group">
    <h2>Higher Court Advocates</h2>

    <div class="row">
        <?php

        $non_qc_advocates_args = array(
            'posts_per_page' => - 1,
            'post_type'      => 'advocate',
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
            'meta_query'     => array(
                array(
                    'key'     => 'advocate-call',
                    'value'   => '',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'     => 'advocate-surname',
                    'value'   => '',
                    'compare' => 'LIKE'
                )
            ),
            'tax_query'      => array(
                array(
                    'taxonomy' => 'advocate-type',
                    'field'    => 'slug',
                    'terms'    => array(
                        'senior-higher-courts-advocates',
                        'junior-higher-courts-advocates',
                    ),
                )
            )
        );

        add_filter('posts_orderby', 'orderbyreplace');
        $non_qc_advocates = new WP_Query($non_qc_advocates_args);
        remove_filter('posts_orderby', 'orderbyreplace');

        $i = 1;
        while ($non_qc_advocates->have_posts()) {
            $non_qc_advocates->the_post();

            // Hide advocates that have no photo
            if ( ! has_post_thumbnail()) {
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

            $col_width = array(
                'md' => 2,
                'sm' => 3,
            );

            $vars = compact('name', 'image', 'profile_link', 'summary', 'col_width');

            template_part('templates/person/person-small', $vars);

            if ($i % 6 === 0) {
                echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
            }
            if ($i % 4 === 0) {
                echo '<div class="clearfix visible-sm-block"></div>';
            }
            if ($i % 2 === 0) {
                echo '<div class="clearfix visible-xs-block"></div>';
            }

            $i ++;
        }

        ?>
    </div>
</section>
