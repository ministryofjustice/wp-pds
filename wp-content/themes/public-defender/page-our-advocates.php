<div id="page-header"></div>
<div class="page-header">
    <h1><?php the_title(); ?></h1>
</div>
<div id="advocates-container">
    <h2>QCs</h2>
    <div class="row" id="qc-advocates">
        <?php
        $qc_advocates_args = array(
            'posts_per_page' => -1,
            'post_type' => 'advocate',
            'meta_key' => 'advocate-surname',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'advocate-type',
                    'field' => 'slug',
                    'terms' => 'qc'
                )
            )
        );
        $qc_advocates = new WP_Query($qc_advocates_args);
        if ($qc_advocates->have_posts()) {
            $slide_count = 0;
            while ($qc_advocates->have_posts()) {
                $qc_advocates->the_post();
                ?>
                <article class="col-md-2 col-sm-6 col-xs-12 advocate-bio advocate-<?php the_ID(); ?>">
                    <a href="<?php echo get_metadata('post', get_the_ID(), 'advocate-cv', true) ?>">
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
                        <a href="<?php echo get_metadata('post', get_the_ID(), 'advocate-cv', true) ?>">Full Profile</a>
                    </div>
                </article>
                <?php
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
            'meta_key' => 'advocate-surname',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'advocate-type',
                    'field' => 'slug',
                    'terms' => 'qc',
                    'operator' => 'NOT IN'
                )
            )
        );
        $non_qc_advocates = new WP_Query($non_qc_advocates_args);
        if ($non_qc_advocates->have_posts()) {
            $slide_count = 0;
            while ($non_qc_advocates->have_posts()) {
                $non_qc_advocates->the_post();
                ?>
                <article class="col-md-2 col-sm-6 col-xs-12 advocate-bio advocate-<?php the_ID(); ?>">
                    <a href="<?php echo get_metadata('post', get_the_ID(), 'advocate-cv', true) ?>">
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
                        <a href="<?php echo get_metadata('post', get_the_ID(), 'advocate-cv', true) ?>">Full Profile</a>
                    </div>
                </article>
                <?php
            }
        }
        ?>
    </div>
</div>