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
            get_template_part('templates/person/' . $use_template);

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

    <h2>More Information</h2>
    <ul>
      <li><a href="#">Directions to our Cheltenham office</a></li>
      <li><a href="#">Directions to Cheltenham Magistrates</a></li>
      <li><a href="#">Directions to Cheltenham Police Station</a></li>
      <li><a href="#">Directions to Cheltenham Crown Court</a></li>
    </ul>

  </div>
</div>









<div style="clear:both"></div>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>





<div id="advocates-container">
  <h2>Head of Advocacy</h2>
  <div class="row" id="head-advocates">
    <?php
    $qc_advocates_args = array(
      'posts_per_page' => -1,
      'post_type' => 'advocate',
      'p' => $advocacy_head->ID,
    );
    $qc_advocates = new WP_Query($qc_advocates_args);
    if ($qc_advocates->have_posts()) {
      $slide_count = 0;
      while ($qc_advocates->have_posts()) {
        $qc_advocates->the_post();
        ?>
        <article class="col-lg-12 advocate-bio advocate-<?php the_ID(); ?>">
          <a class='col-md-2 col-sm-6 col-xs-6' href="<?php echo get_metadata('post', get_the_ID(), 'advocate-cv', true) ?>">
            <?php
            if (has_post_thumbnail()) {
              the_post_thumbnail('advocate_slide_thumb', array(
                'class' => 'advocate-picture'
              ));
            } else {
              echo "<img class='advocate-picture' height=190 src='" . get_bloginfo('template_url') . "/assets/img/man.png'>";
            }
            ?>
          </a>
          <div class='col-md-4 col-sm-6 col-xs-6'>
            <a href="<?php echo get_metadata('post', get_the_ID(), 'advocate-cv', true) ?>">
              <div class="advocate-name"><?php the_title(); ?></div>
            </a>
            <div class="advocate-skills"><?php echo get_metadata('post', get_the_ID(), 'advocate-brief', true) ?></div>
            <div class="advocate-bio-link">
              <a href="<?php echo get_metadata('post', get_the_ID(), 'advocate-cv', true) ?>">Full Profile</a>
            </div>
          </div>
        </article>
        <?php
      }
    }
    ?>
  </div>
  <h2>QCs</h2>
  <div class="row" id="qc-advocates">
    <?php
    $qc_advocates_args = array(
      'posts_per_page' => -1,
      'post_type' => 'advocate',
      'orderby' => 'menu_order',
      'order' => 'ASC',
      'post__not_in' => array($advocacy_head->ID),
      'meta_query' => array(
        array(
          'key' => 'advocate-call',
          'value' => '',
          'compare' => 'LIKE'
        ),
        array(
          'key' => 'advocate-surname',
          'value' => '',
          'compare' => 'LIKE'
        )
      ),
      'tax_query' => array(
        array(
          'taxonomy' => 'advocate-type',
          'field' => 'slug',
          'terms' => 'qc'
        )
      )
    );
    add_filter('posts_orderby','orderbyreplace');
    $qc_advocates = new WP_Query($qc_advocates_args);
    remove_filter('posts_orderby','orderbyreplace');
    if ($qc_advocates->have_posts()) {
      $slide_count = 0;
      while ($qc_advocates->have_posts()) {
        $qc_advocates->the_post();
        // Hide advocates that have no photo
        if (has_post_thumbnail()) {
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
    }
    ?>
  </div>
  <h2>Higher Court Advocates</h2>
  <div class="row" id="non-qc-advocates">
    <?php
    $non_qc_advocates_args = array(
      'posts_per_page' => -1,
      'post_type' => 'advocate',
      'orderby' => 'menu_order',
      'order' => 'ASC',
      'meta_query' => array(
        array(
          'key' => 'advocate-call',
          'value' => '',
          'compare' => 'LIKE'
        ),
        array(
          'key' => 'advocate-surname',
          'value' => '',
          'compare' => 'LIKE'
        )
      ),
      'tax_query' => array(
        array(
          'taxonomy' => 'advocate-type',
          'field' => 'slug',
          'terms' => 'qc',
          'operator' => 'NOT IN'
        )
      )
    );
    add_filter('posts_orderby','orderbyreplace');
    $non_qc_advocates = new WP_Query($non_qc_advocates_args);
    remove_filter('posts_orderby','orderbyreplace');
    if ($non_qc_advocates->have_posts()) {
      $slide_count = 0;
      while ($non_qc_advocates->have_posts()) {
        $non_qc_advocates->the_post();
        // Hide advocates that have no photo
        if (has_post_thumbnail()) {
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
    }
    ?>
  </div>
</div>
