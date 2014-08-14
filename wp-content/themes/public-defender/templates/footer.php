<footer class="content-info" role="contentinfo">
    <!--<div class="container">-->
    <?php
    // Get Advocacy footer text
    $advocate_page = get_page_by_path('advocates');
    $advocacy_query = new WP_Query(array(
        'post_parent' => $advocate_page->ID,
        'name' => 'contact-us',
        'post_type' => 'page'
    ));
    $advocacy_contact = $advocacy_query->posts[0]->post_content;

    // Get Solicitors footer text
    $solicitors_page = get_page_by_path('solicitors');
    $solicitors_query = new WP_Query(array(
        'post_parent' => $solicitors_page->ID,
        'name' => 'contact-us',
        'post_type' => 'page'
    ));
    $solicitors_contact = $solicitors_query->posts[0]->post_content;

    // Left for legacy reasons
    if (has_nav_menu('footer_navigation')) :
    //wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav navbar-nav'));
    endif;
    ?>
    <section id="footer-newsletter" class="container">
        <div class="col-md-7">
            <h2>Newsletter</h2>
            Sign up to join our newsletter. Stay up-to-date by email.
        </div>
        <div class="col-md-5">
            <button>Sign up for the newsletter</button>
        </div>
    </section>
    <section id="footer-contact" class="container">
        <div class="col-md-8">
            <h2>Contact Us</h2>
        </div>
        <div class="col-md-4">
            <h2>Follow Us</h2>
        </div>
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
        <div class="col-md-4 socicons">
            <!--<a href="https://twitter.com/publicdefenderservice"><span class="socicon">a</span><span class="twitter-handle">@publicdefenderservice</span></a>-->
        </div>
    </section>
    <!--</div>-->
</footer>

<?php wp_footer(); ?>
