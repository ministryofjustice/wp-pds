<?php the_post(); ?>
<section id="home-main">
    <div id="welcome" class="row">
        <h1 class='col-md-12'>Welcome to the PDS</h1>
        <div class='col-lg-6 col-md-7 col-sm-8 col-xs-12'>
            <?php the_content(); ?>
        </div>
    </div>
    <?php

    $solicitors_page = get_page_by_template('template-solicitors-home.php');
    $advocates_page = get_page_by_template('template-advocates-home.php');

    ?>
    <div class="row">
        <div class="col-md-5 col-md-offset-1 col-sm-6 col-xs-12">
            <a href="<?php the_permalink($solicitors_page); ?>" class="site-section-cta site-section-cta--solicitors">
                <div>PDS Solicitors</div>
            </a>
        </div>

        <div class="col-md-5 col-sm-6 col-xs-12">
            <a href="<?php the_permalink($advocates_page); ?>" class="site-section-cta site-section-cta--advocates">
                <div>PDS Advocacy Team</div>
            </a>
        </div>
    </div>
</section>
