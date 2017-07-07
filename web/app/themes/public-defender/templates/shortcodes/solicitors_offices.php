<?php
/**
 * Display office locations in a grid.
 * Snippet tag: [solicitors_offices]
 * Attributes:
 *  - col-md (optional) Number of columns wide each office should be.
 */
?>

<?php

$offices_page = get_page_by_template('template-our-offices-page.php');

$args = array(
  'post_type' => 'page',
  'post_status' => 'publish',
  'post_parent' => $offices_page->ID,
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

      $col_md = isset($atts['col-md']) ? $atts['col-md'] : 6;

      ?>
      <div class="col-md-<?php echo $col_md; ?> col-sm-6">
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
