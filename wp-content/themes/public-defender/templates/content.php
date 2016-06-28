<article <?php post_class('news-post-summary'); ?>>
  <aside>
    <?php if (has_post_thumbnail()): ?>
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('post-thumbnail', array('class' => 'news-post-summary__thumbnail')); ?>
      </a>
    <?php endif; ?>
  </aside>

  <header>
    <h2 class="news-post-summary__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>

  <div class="news-post-summary__excerpt">
    <?php the_excerpt(); ?>
  </div>
</article>
