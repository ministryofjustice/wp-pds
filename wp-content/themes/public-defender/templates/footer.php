<footer class="content-info" role="contentinfo">
    <!--<div class="container">-->
    <?php
    // Left for legacy reasons
    if (has_nav_menu('footer_navigation')) :
    //wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav navbar-nav'));
    endif;
    ?>
    <section id="footer-newsletter" class="container">
        <div class="col-md-7">
            Newsletter
        </div>
        <div class="col-md-5">
            <button>Sign up for the newsletter</button>
        </div>
    </section>
    <section id="footer-contact" class="container">
        <div class="col-md-8">
            <h2>Contact Us Both</h2>
        </div>
        <div class="col-md-4">
            <h2>Follow Us</h2>
        </div>
        <div class="col-md-4">
            <h3>PDS Solicitors</h3>
            <p>If you have a query, comment or request for information, contact the PDS Business Team:<br>Email: <a href="mailto:pds.businessteam@legalaid.gsi.gov.uk">pds.businessteam@legalaid.gsi.gov.uk</a></p>
            <strong>Key contact</strong>
            <p>Operations Manager: David Marshalsay Contact via Swansea office or<br>email <a href="mailto:david.marshalsay@legalaid.gsi.gov.uk">david.marshalsay@legalaid.gsi.gov.uk</a></p>
        </div>
        <div class="col-md-4">
            <h3>PDS Advocacy Unit</h3>
            <p>Our Advocates are based across the country and can operate anywhere within England and Wales.</p>
            <p>PDS Advocacy Unit clerk – contact details<br><a href="pdsclerks@legalaid.gsi.gov.uk">pdsclerks@legalaid.gsi.gov.uk</a></p>
            <p>To enquire about the availability of our advocates, please contact Sarah Bennett:<br>Telephone: 07834 140782/01325 289488 or email <a href="sarah.bennett@legalaid.gsi.gov.uk">sarah.bennett@legalaid.gsi.gov.uk</a></p>
        </div>
        <div class="col-md-4 socicons">
            <a href=""><span class="socicon">,</span></a>
            <a href=""><span class="socicon">v</span></a>
            <a href=""><span class="socicon">r</span></a>
            <a href=""><span class="socicon">a</span></a>
            <a href=""><span class="socicon">b</span></a>
        </div>
    </section>
    <!--</div>-->
</footer>

<?php wp_footer(); ?>
