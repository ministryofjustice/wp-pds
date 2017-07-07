<footer class="content-info" role="contentinfo">
    <?php

    // Get Advocacy footer text
    $advocacy_home = get_page_by_template('template-advocates-home.php');
    $advocacy_query = new WP_Query(array(
        'post_parent' => $advocacy_home->ID,
        'name' => 'contact-us',
        'post_type' => 'page',
        'posts_per_page' => -1,
    ));
    $advocacy_contact = wpautop(wptexturize($advocacy_query->posts[0]->post_content));

    // Get Solicitors footer text
    $solicitors_home = get_page_by_template('template-solicitors-home.php');
    $solicitors_query = new WP_Query(array(
        'post_parent' => $solicitors_home->ID,
        'name' => 'contact-us',
        'post_type' => 'page',
        'posts_per_page' => -1,
    ));
    $solicitors_contact = wpautop(wptexturize($solicitors_query->posts[0]->post_content));

    wp_reset_postdata();
    $site_section = get_site_section();

    ?>
    <section id="footer-contact" class="container">
      <div class="row">
        <div class="col-md-8">
            <h2>Contact Us</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
            <?php

            if ($site_section == 'advocates' || !$site_section) {
                echo $advocacy_contact;
            }

            if ($site_section == 'solicitors') {
                echo $solicitors_contact;
            }

            ?>
        </div>
        <div class="col-md-4">
            <?php

            if (!$site_section) {
                echo $solicitors_contact;
            }

            ?>
        </div>
      </div>
    </section>
</footer>

<?php wp_footer(); ?>
