<div id="advocates-container">
    <row id="advocates">
        <?php
        $all_advocates_args = array(
            'posts_per_page' => -1,
            'post_type' => 'advocate',
            'orderby' => 'rand'
        );
        $all_advocates = new WP_Query($all_advocates_args);
        if ($all_advocates->have_posts()) {
            $slide_count = 0;
            while ($all_advocates->have_posts()) {
                $all_advocates->the_post();
                ?>
                <article class="col-md-2 col-sm-6 col-xs-12 advocate-bio advocate-<?php the_ID(); ?>">
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
                    <div class="advocate-skills"><?php echo get_metadata('post', get_the_ID(), 'advocate-brief', true) ?></div>
                    <div class="advocate-bio-link">
                        <a href="<?php echo get_metadata('post', get_the_ID(), 'advocate-cv', true) ?>">Full Profile</a>
                    </div>
                </article>
                <?php
            }
        }
        ?>
    </row>
</div>