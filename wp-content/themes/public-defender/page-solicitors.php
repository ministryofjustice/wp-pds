<?php
/**
 * Template name: Solicitors Home
 */
the_post();

$news_category_slug = get_post_meta($post->ID, 'news-category', true);
$news_category = get_term_by('slug', $news_category_slug, 'category');

?>
<div id="page-header">
  <h1>PDS Solicitors</h1>
</div>

<div class="row">
  <div class="col-md-8">
    <?php the_content(); ?>
  </div>

  <aside class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2 class="panel-title">News Feed</h2>
      </div>

      <?php

      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'tax_query' => array(
          array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $news_category->term_id,
          )
        )
      );

      $query = new WP_Query($args);

      ?>
      <ul class="list-group">
        <?php while ($query->have_posts()): $query->the_post(); ?>
          <li class="list-group-item">
            <article class="news-feed-item">
              <h3 class="news-feed-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <time class="news-feed-item__date" datetime="<?php the_time('Y-m-d h:i'); ?>"><?php the_time('d F Y'); ?></time>

              <?php if (has_post_thumbnail()): ?>
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('post-thumbnail', array('class' => 'news-feed-item__thumbnail')); ?>
                </a>
              <?php endif; ?>

              <div class="news-feed-item__excerpt">
                <?php the_excerpt(); ?>
              </div>
            </article>
          </li>
        <?php endwhile; ?>
      </ul>
      <?php wp_reset_postdata(); ?>

      <div class="panel-footer">
        <?php
        $url = get_category_link($news_category);
        ?>
        <a href="<?php echo esc_url($url); ?>" class="btn btn-primary btn-block">See More News</a>
      </div>
    </div>
  </aside>

</div>
