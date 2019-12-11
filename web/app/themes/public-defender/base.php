
<?php
do_action('get_header');
get_header();
?>

    <article class="wrap container" role="document">
      <div class="row">
        <div class="main <?php echo roots_main_class(); ?>" role="main">
            <?php include roots_template_path(); ?>
        </div><!-- /.main -->
      </div>
    </article><!-- /.wrap -->

<?php get_footer(); ?>