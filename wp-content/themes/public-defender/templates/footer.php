<footer class="content-info" role="contentinfo">
    <div class="container">
        <?php
        if (has_nav_menu('footer_navigation')) :
            wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
        ?>
    </div>
</footer>

<?php wp_footer(); ?>
