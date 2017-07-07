<?php the_post(); ?>
<?php get_template_part('templates/page-header'); ?>

<?php get_template_part('templates/entry-meta'); ?>

<div class="entry-content">
  <?php the_content(); ?>
</div>
