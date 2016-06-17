<footer class="content-info" role="contentinfo">
    <?php
    // Get Advocacy footer text
    $advocate_page = get_page_by_path('advocates');
    $advocacy_query = new WP_Query(array(
        'post_parent' => $advocate_page->ID,
        'name' => 'contact-us',
        'post_type' => 'page'
    ));
    $advocacy_contact = wpautop($advocacy_query->posts[0]->post_content);

    // Get Solicitors footer text
    $solicitors_page = get_page_by_path('solicitors');
    $solicitors_query = new WP_Query(array(
        'post_parent' => $solicitors_page->ID,
        'name' => 'contact-us',
        'post_type' => 'page'
    ));
    $solicitors_contact = wpautop($solicitors_query->posts[0]->post_content);

    ?>
    <section id="footer-newsletter" class="container"></section>
    <section id="footer-contact" class="container">
      <div class="row">
        <div class="col-md-8">
            <h2>Contact Us</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
            <?php
            if (is_tree($advocate_page->ID)) {
                echo $advocacy_contact;
            } else {
                echo $solicitors_contact;
            }
            ?>
        </div>
        <div class="col-md-4">
            <?php
            if (is_front_page() || is_404()) {
                echo $advocacy_contact;
            }
            ?>
        </div>
      </div>
    </section>
</footer>

<?php wp_footer(); ?>
