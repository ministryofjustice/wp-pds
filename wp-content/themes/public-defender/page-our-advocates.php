<?php $advocacy_head = get_page_by_title("David Aubrey QC", "OBJECT", "advocate"); ?>

<?php get_template_part('templates/page-header'); ?>

<div id="advocates-container people-group">
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
        <div class="col-md-8">
          <div class="row">
            <?php

            $name = get_the_title();

            $image_id = get_post_thumbnail_id();
            $image = acf_get_attachment($image_id);

            $profile_link = get_metadata('post', get_the_ID(), 'advocate-cv', true);
            if (empty($profile_link)) {
              $profile_link = false;
            }

            $summary = get_metadata('post', get_the_ID(), 'advocate-brief', true);
            if (empty($summary)) {
              $summary = false;
            }

            $vars = compact('name', 'image', 'profile_link', 'summary');

            template_part('templates/person/person-wide', $vars);

            ?>
          </div>
        </div>
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
      'post__not_in' => array(
        $advocacy_head->ID
      ),
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
      $i = 1;
      while ($qc_advocates->have_posts()) {
        $qc_advocates->the_post();

        // Hide advocates that have no photo
        if (!has_post_thumbnail()) {
          continue;
        }

        $name = get_the_title();

        $image_id = get_post_thumbnail_id();
        $image = acf_get_attachment($image_id);

        $profile_link = get_metadata('post', get_the_ID(), 'advocate-cv', true);
        if (empty($profile_link)) {
          $profile_link = false;
        }

        $summary = get_metadata('post', get_the_ID(), 'advocate-brief', true);
        if (empty($summary)) {
          $summary = false;
        }

        $col_width = array(
          'md' => 2,
          'sm' => 3,
        );

        $vars = compact('name', 'image', 'profile_link', 'summary', 'col_width');

        template_part('templates/person/person-small', $vars);

        if ($i % 6 === 0) {
          echo '<div class="clearfix"></div>';
        }
        else if ($i % 4 === 0) {
          echo '<div class="clearfix visible-sm-block"></div>';
        }
        else if ($i % 2 === 0) {
          echo '<div class="clearfix visible-xs-block"></div>';
        }

        $i++;
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
        if (!has_post_thumbnail()) {
          continue;
        }

        $name = get_the_title();

        $image_id = get_post_thumbnail_id();
        $image = acf_get_attachment($image_id);

        $profile_link = get_metadata('post', get_the_ID(), 'advocate-cv', true);
        if (empty($profile_link)) {
          $profile_link = false;
        }

        $summary = get_metadata('post', get_the_ID(), 'advocate-brief', true);
        if (empty($summary)) {
          $summary = false;
        }

        $col_width = array(
          'md' => 2,
          'sm' => 3,
        );

        $vars = compact('name', 'image', 'profile_link', 'summary', 'col_width');

        template_part('templates/person/person-small', $vars);

        if ($i % 6 === 0) {
          echo '<div class="clearfix"></div>';
        }
        else if ($i % 4 === 0) {
          echo '<div class="clearfix visible-sm-block"></div>';
        }
        else if ($i % 2 === 0) {
          echo '<div class="clearfix visible-xs-block"></div>';
        }

        $i++;
      }
    }
    ?>
  </div>
</div>
