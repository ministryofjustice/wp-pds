<?php
/**
 * Template name: Advocates Home
 */
the_post();

?>
<div id="page-header">
  <h1>PDS Advocacy Unit</h1>
</div>

<div class="page-header">
    <h1>Advocates Home</h1>
</div>

<div id="advocates-slider-container">
    <div id="advocates-slider">
        <?php
        $random_advocates_args = array(
            'posts_per_page' => 4,
            'post_type' => 'advocate',
            'orderby' => 'rand',
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'advocate-show',
                    'value' => 'off',
                    'compare' => '!='
                ),
                array(
                    'key' => 'advocate-show',
                    'compare' => 'NOT EXISTS'
                )
            )
        );
        $random_advocates = new WP_Query($random_advocates_args);
        if ($random_advocates->have_posts()) {
            $slide_count = 0;
            while ($random_advocates->have_posts()) {
                $random_advocates->the_post();
                $slide_count++;
                ?>
                <div class="slide-image col-xs-6 col-sm-5 <?php if ($slide_count == 1) echo "col-xs-offset-3 col-sm-offset-1 col-md-offset-0 "; ?>col-md-4 col-lg-3" id="slide-<?php the_ID(); ?>">
                    <?php
                    if (has_post_thumbnail()) {
                        echo "<a href='" . get_metadata('post', get_the_ID(), 'advocate-cv', true) . "'>";
                        the_post_thumbnail('advocate_slide');
                        echo "</a>";
                    } else {
                        echo "<img src='" . get_bloginfo('template_url') . "/assets/img/man.png'>";
                    }
                    ?>
                    <div class="slide-info">
                        <strong><?php the_title(); ?></strong><br>
                        <?php echo get_metadata('post', get_the_ID(), 'advocate-brief', true) ?>
                    </div>
                </div>
                <?php
            }
        }
        wp_reset_postdata();
        ?>
    </div>
</div>

<div class="row" style="margin-top: 1em;">
  <div class="col-md-8">
    <?php the_content(); ?>
  </div>
  <aside class="col-md-4">
    <?php

    $news_category_slug = get_post_meta($post->ID, 'news-category', true);
    $news_category = get_term_by('slug', $news_category_slug, 'category');
    template_part('templates/news-feed', compact('news_category'));

    ?>
  </aside>
</div>
