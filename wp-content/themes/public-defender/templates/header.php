<header class="banner navbar navbar-default navbar-static-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <?php if (!is_page('home')) { ?>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <?php } ?>
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"></a>
            <a class="navbar-brand-name" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
        </div>
        <nav class="collapse navbar-collapse" role="navigation">
            <div class="advocate-phone">To contact our clerk, please call 01325 289488</div>
            <?php
            if (!is_page('home')) {
                $advocate_page = get_page_by_path('advocates');
                if (is_tree($advocate_page->ID)) {
                    wp_nav_menu(array('theme_location' => 'primary_navigation_advocates', 'menu_class' => 'nav navbar-nav'));
                } else {
                    wp_nav_menu(array('theme_location' => 'primary_navigation_solicitors', 'menu_class' => 'nav navbar-nav'));
                }
            } else {
                wp_nav_menu(array('theme_location' => 'primary_navigation_home', 'menu_class' => 'nav navbar-nav'));
            }
            ?>
        </nav>
    </div>
</header>