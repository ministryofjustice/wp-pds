<?php $advocacy_head = get_page_by_title("David Aubrey QC", "OBJECT", "advocate"); ?>
<div id="page-header"></div>
<div class="page-header">
    <h1><?php the_title(); ?></h1>
</div>
<div id="advocates-container">
    <h2>Head of Advocacy</h2>
    <div class="row" id="head-advocates">
        <?php
        $qc_advocates_args = array(
            'posts_per_page' => -1,
            'post_type' => 'advocate',
            'p' => $advocacy_head->ID,
        );
        $qc_advocates = new WP_Query($qc_advocates_args);
        if ($qc_advocates->have_posts()) {
            $slide_count = 0;
            while ($qc_advocates->have_posts()) {
                $qc_advocates->the_post();
                ?>
                <article class="col-lg-12 advocate-bio advocate-<?php the_ID(); ?>">
                    <a class='col-md-2 col-sm-6 col-xs-6' href="<?= get_the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('advocate_slide_thumb', array(
                                'class' => 'advocate-picture'
                            ));
                        } else {
                            echo "<img class='advocate-picture' height=190 src='" . get_bloginfo('template_url') . "/assets/img/man.png'>";
                        }
                        ?>
                    </a>
                    <div class='col-md-4 col-sm-6 col-xs-6'>
                        <a href="<?= get_the_permalink(); ?>">
                            <div class="advocate-name"><?php the_title(); ?></div>
                        </a>
                        <div class="advocate-skills"><?php echo get_metadata('post', get_the_ID(), 'advocate-brief', true) ?></div>
                        <div class="advocate-bio-link">
                            <a href="<?= get_the_permalink(); ?>">Full Profile</a>
                        </div>
                    </div>
                </article>
                <?php
            }
        }
        ?>
    </div>
    <h2>QCs</h2>
    <div class="row" id="qc-advocates">
        <?php
        $qc_advocates_args = array(
            'posts_per_page' => -1,
            'post_type' => 'advocate',
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post__not_in' => array($advocacy_head->ID),
            'meta_query' => array(
                array(
                    'key' => 'advocate-call',
                    'value' => '',
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'advocate-surname',
                    'value' => '',
                    'compare' => 'LIKE'
                )
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'advocate-type',
                    'field' => 'slug',
                    'terms' => 'qc'
                )
            )
        );
        add_filter('posts_orderby','orderbyreplace');
        $qc_advocates = new WP_Query($qc_advocates_args);
        remove_filter('posts_orderby','orderbyreplace');
        if ($qc_advocates->have_posts()) {
            $slide_count = 0;
            while ($qc_advocates->have_posts()) {
                $qc_advocates->the_post();
                // Hide advocates that have no photo
                if (has_post_thumbnail()) {
                    ?>
                    <article class="col-md-2 col-sm-6 col-xs-12 advocate-bio advocate-<?php the_ID(); ?>">
                        <a href="<?= get_the_permalink(); ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('advocate_slide_thumb', array(
                                    'class' => 'advocate-picture'
                                ));
                            } else {
                                echo "<img height=190 class='advocate-picture' src='" . get_bloginfo('template_url') . "/assets/img/man.png'>";
                            }
                            ?>
                            <div class="advocate-name"><?php the_title(); ?></div>
                        </a>
                        <div class="advocate-skills"><?php echo get_metadata('post', get_the_ID(), 'advocate-brief', true) ?></div>
                        <div class="advocate-bio-link">
                            <a href="<?= get_the_permalink(); ?>">Full Profile</a>
                        </div>
                    </article>
                    <?php
                }
            }
        }
        ?>
    </div>
    <h2>Higher Court Advocates</h2>
    <div class="row" id="non-qc-advocates">
        <?php
        $non_qc_advocates_args = array(
            'posts_per_page' => -1,
            'post_type' => 'advocate',
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'advocate-call',
                    'value' => '',
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'advocate-surname',
                    'value' => '',
                    'compare' => 'LIKE'
                )
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'advocate-type',
                    'field' => 'slug',
                    'terms' => 'qc',
                    'operator' => 'NOT IN'
                )
            )
        );
        add_filter('posts_orderby','orderbyreplace');
        $non_qc_advocates = new WP_Query($non_qc_advocates_args);
        remove_filter('posts_orderby','orderbyreplace');
        if ($non_qc_advocates->have_posts()) {
            $slide_count = 0;
            while ($non_qc_advocates->have_posts()) {
                $non_qc_advocates->the_post();
                // Hide advocates that have no photo
                if (has_post_thumbnail()) {
                    ?>
                    <article class="col-md-2 col-sm-6 col-xs-12 advocate-bio advocate-<?php the_ID(); ?>">
                        <a href="<?= get_the_permalink(); ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('advocate_slide_thumb', array(
                                    'class' => 'advocate-picture'
                                ));
                            } else {
                                echo "<img height=190 class='advocate-picture' src='" . get_bloginfo('template_url') . "/assets/img/man.png'>";
                            }
                            ?>
                            <div class="advocate-name"><?php the_title(); ?></div>
                        </a>
                        <div class="advocate-skills"><?php echo get_metadata('post', get_the_ID(), 'advocate-brief', true) ?></div>
                        <div class="advocate-bio-link">
                            <a href="<?= get_the_permalink(); ?>">Full Profile</a>
                        </div>
                    </article>
                    <?php
                }
            }
        }
        ?>
    </div>
</div>
