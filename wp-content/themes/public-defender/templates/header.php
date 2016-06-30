<header class="banner navbar navbar-default navbar-static-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"></a>
            <a class="navbar-brand-name" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
        </div>
        <nav class="collapse navbar-collapse" role="navigation">
            <div class="advocate-phone">Please contact our Senior Clerk, Robin Driscoll, on 020 3334 4253 / 6163 / 2837</div>
            <?php

            switch (get_site_section()) {
              case 'advocates':
                $theme_location = 'primary_navigation_advocates';
                break;

              case 'solicitors':
                $theme_location = 'primary_navigation_solicitors';
                break;

              default:
                $theme_location = 'primary_navigation_home';
                break;
            }

            wp_nav_menu(array(
              'theme_location' => $theme_location,
              'menu_class' => 'nav navbar-nav',
            ));

            ?>
        </nav>
    </div>
</header>
