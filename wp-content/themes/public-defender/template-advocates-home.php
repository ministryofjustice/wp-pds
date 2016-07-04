<?php
/**
 * Template name: Advocates Home
 */
the_post();

?>
<div id="page-header">
  <h1>PDS Advocacy Unit</h1>
</div>

<div class="row">
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
