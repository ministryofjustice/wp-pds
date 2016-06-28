<?php
/**
 * Template name: Our Offices page
 */
the_post();
?>

<?php get_template_part('templates/page-header'); ?>

<?php the_content(); ?>

<?php

$args = array(
  'post_type' => 'page',
  'post_status' => 'publish',
  'post_parent' => get_the_ID(),
  'posts_per_page' => -1,
  'orderby' => 'title',
  'order' => 'ASC',
);

$offices = new WP_Query($args);

?>
<?php if ($offices->have_posts()): ?>
<div class="row">
  <?php while ($offices->have_posts()): $offices->the_post(); ?>
    <?php

    if (has_post_thumbnail()) {
      $image_id = get_post_thumbnail_id();
      $image = acf_get_attachment($image_id);
      $image_url = esc_url($image['sizes']['deep_link']);
      $style = "background-image: url('{$image_url}');";
    }
    else {
      $style = false;
    }

    ?>
    <div class="col-md-3 col-sm-6">
      <a href="<?php the_permalink(); ?>" class="deep-link" <?php if ($style) echo 'style="' . $style . '"'; ?>>
        <div class="deep-link__title">
          <?php the_title(); ?>
        </div>
      </a>
    </div>
  <?php endwhile; ?>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
