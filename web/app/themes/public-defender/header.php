<?php get_template_part('head'); ?>
<header class="site-header navbar navbar-default navbar-static-top" role="banner">
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
            <?php

            $site_section = get_site_section();

            $header_message_field = 'header_message_' . (!$site_section ? 'homepage' : $site_section);
            $header_message = get_field($header_message_field, 'option');

            ?>
            <?php if (!empty($header_message)): ?>
                <div class="header-message"><?php echo wptexturize($header_message); ?></div>
            <?php endif; ?>
            <?php

            switch ($site_section) {
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
