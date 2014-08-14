<?php get_template_part('templates/head'); ?>
<?php
$advocate_page = get_page_by_path('advocates');
if (!is_front_page()) {
    if (is_tree($advocate_page->ID)) {
        $extra_body = 'advocate-pages';
    } else {
        $extra_body = 'solicitors-pages';
    }
} else {
    $extra_body = "";
}
?>
<body <?php body_class(get_post( $post )->post_name . " " . $extra_body); ?>>

    <!--[if lt IE 8]>
      <div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
      </div>
    <![endif]-->

    <?php
    do_action('get_header');
    get_template_part('templates/header');
    ?>

    <div class="wrap container" role="document">
        <div class="content row">
            <main class="main <?php echo roots_main_class(); ?>" role="main">
                <?php include roots_template_path(); ?>
            </main><!-- /.main -->
            <?php if (roots_display_sidebar()) : ?>
                <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
                    <?php include roots_sidebar_path(); ?>
                </aside><!-- /.sidebar -->
            <?php endif; ?>
        </div><!-- /.content -->
    </div><!-- /.wrap -->

    <?php get_template_part('templates/footer'); ?>

</body>
</html>
