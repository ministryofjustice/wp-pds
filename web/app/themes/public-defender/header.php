<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />

    <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
</head>

<?php

$class = array();

$section_class_map = array(
    'advocates' => 'advocate-pages',
    'solicitors' => 'solicitors-pages',
);

$section = get_site_section();
if ($section) {
    $class[] = $section_class_map[$section];
}

if ($post && $post->post_type == 'page') {
    $class[] = $post->post_name;
}

?>
<body <?php body_class(implode(' ', $class)); ?>>

<!--[if lt IE 9]>
<div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
</div>
<![endif]-->

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
