<?php
/**
 * Template name: Our Offices page
 */
the_post();

get_template_part('templates/page-header');
the_content();
echo do_shortcode('[solicitors_offices col-md="3"]');
