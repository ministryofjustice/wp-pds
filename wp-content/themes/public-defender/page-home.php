<section id="home-main">
    <div id="welcome">
        <h1 class='col-md-12'>Welcome to the PDS</h1>
        <div class='col-md-6'>
            <?php the_post(); the_content(); ?>
        </div>
    </div>
    <div id="home-ctas">
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
</section>