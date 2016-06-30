<section id="home-main">
    <div id="welcome" class="row">
        <h1 class='col-md-12'>Welcome to the PDS</h1>
        <div class='col-lg-6 col-md-7 col-sm-8 col-xs-12'>
            <?php the_post(); the_content(); ?>
        </div>
    </div>
    <div id="home-ctas" style="display: none;">
        <a href="<?php echo site_url('solicitors'); ?>" class="home-cta home-solicitors">
            <div class="middle">
                <div class="inner">
                    PDS Solicitors
                </div>
            </div>
        </a>
        <a href="<?php echo site_url('advocates'); ?>" class="home-cta home-advocacy">
            <div class="middle">
                <div class="inner">
                    PDS Advocacy Unit
                </div>
            </div>
        </a>
    </div>
    <div class="row">
        <a href="#" class="home-cta-link col-md-5 col-md-offset-1 col-sm-6 col-xs-12">
            <div class="home-cta home-cta--solicitors">
                PDS Solicitors
            </div>
        </a>
        <a href="#" class="home-cta-link col-md-5 col-sm-6 col-xs-12">
            <div class="home-cta home-cta--advocates">
                PDS Advocacy Unit
            </div>
        </a>
    </div>
</section>
