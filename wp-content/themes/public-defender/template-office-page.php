<?php
/**
 * Template name: Office page
 */
the_post();
?>

<?php get_template_part('templates/page-header'); ?>

<div class="row">
  <div class="col-md-8">
    <?php the_content(); ?>

    <?php while (have_rows('positions')): the_row(); ?>
      <section class="people-group">
        <h2><?php the_sub_field('name'); ?></h2>

        <div class="lawyer-profiles row">
          <?php

          $lawyers = get_sub_field('lawyers');
          $lawyers_count = count($lawyers);

          if ($lawyers_count > 2) {
            $use_template = 'person-small';
          } else {
            $use_template = 'person-wide';
          }

          $i = 1;
          while (have_rows('lawyers')) {
            the_row();

            $bio = get_sub_field('biography');
            if (!empty($bio)) {
              $profile_link = $bio['url'];
            }
            else {
              $profile_link = false;
            }

            $vars = array(
              'name' => wptexturize(get_sub_field('name')),
              'image' => get_sub_field('photo'),
              'profile_link' => $profile_link,
              'summary' => wptexturize(get_sub_field('summary')),
            );
            template_part('templates/person/' . $use_template, $vars);

            if ($i % 4 === 0) {
              echo '<div class="clearfix"></div>';
            }
            else if ($i % 2 === 0) {
              echo '<div class="clearfix visible-xs-block visible-xs-block"></div>';
            }

            $i++;
          }

          ?>
        </div>
      </section>
    <?php endwhile; ?>
  </div>

  <div class="col-md-4 office-sidebar">
    <h2>Contact Details</h2>

    <dl>
      <?php if (!field_is_empty('address')): ?>
      <dt>Address</dt>
      <dd>
        <?php the_field('address'); ?><br/>
        <?php the_field('postcode'); ?>
      </dd>
      <?php endif; ?>

      <?php if (!field_is_empty('dx')): ?>
      <dt>DX</dt>
      <dd><?php the_field('dx'); ?></dd>
      <?php endif; ?>

      <?php if (!field_is_empty('telephone')): ?>
        <dt>Telephone</dt>
        <dd><?php the_field('telephone'); ?></dd>
      <?php endif; ?>

      <?php if (!field_is_empty('fax')): ?>
        <dt>Fax</dt>
        <dd><?php the_field('fax'); ?></dd>
      <?php endif; ?>

      <?php if (!field_is_empty('email')): ?>
        <dt>Email</dt>
        <dd>
          <a href="mailto:<?php echo esc_attr(get_field('email')); ?>" title="Email the <?php echo esc_attr(get_the_title()); ?> office">
            <?php the_field('email'); ?>
          </a>
        </dd>
      <?php endif; ?>
    </dl>

    <?php

    $children = get_children(array(
      'post_parent' => get_the_ID(),
      'post_type' => 'page',
      'post_status' => 'publish',
      'numberposts' => -1,
      'orderby' => 'title',
      'order' => 'ASC',
    ));

    ?>
    <?php if (count($children) > 0): ?>
      <h2>Useful Information</h2>
      <ul>
        <?php foreach ($children as $page): ?>
          <li><a href="<?php echo esc_attr(get_permalink($page)); ?>"><?php echo get_the_title($page); ?></a></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

  </div>
</div>
