<?php get_template_part('templates/head'); ?>
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

    <?php
    do_action('get_header');
    get_template_part('templates/header');
    ?>

    <article class="wrap container" role="document">
      <div class="row">
        <div class="main <?php echo roots_main_class(); ?>" role="main">
            <?php include roots_template_path(); ?>
        </div><!-- /.main -->
      </div>
    </article><!-- /.wrap -->

    <?php get_template_part('templates/footer'); ?>

</body>
</html>
