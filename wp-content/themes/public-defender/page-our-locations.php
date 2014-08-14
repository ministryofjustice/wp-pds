<div id="page-header"></div>
<!--<div class="page-header">
    <h1><?php the_title(); ?></h1>
</div>-->
<div class="row" id="locations-container">
    <div id="locations-header" class="col-md-12">
        <?php
        the_post();
        the_content();
        ?>
        <p>We have dedicated offices in:</p>
        <div id="locations-nav">
            <?php
            $first_post = true;
            $locations_query = new WP_Query(array(
                'post_type' => 'location',
                'orderby' => 'title',
                'order' => 'ASC'
            ));
            foreach ($locations_query->posts as $location) {
                if (!$first_post) {
                    echo " | ";
                } else {
                    $first_post = false;
                }
                echo '<a href="#' . strtolower($location->post_title) . '">' . $location->post_title . '</a>';
            }
            ?>
        </div>
    </div>
    <div id="locations-body" class="col-md-12">
<?php foreach ($locations_query->posts as $location) { ?>
            <article class="location" id="<?php echo strtolower($location->post_title); ?>">
                <h2><?php echo $location->post_title; ?></h2>
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <?php echo wpautop(get_metadata('post', $location->ID, 'location-address', true)); ?>
    <?php echo wpautop(get_metadata('post', $location->ID, 'location-postcode', true)); ?>
                            <a href="https://www.google.co.uk/maps/place/<?php echo get_metadata('post', $location->ID, 'location-postcode', true); ?>">Map</a>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="row pad-bot-20">
                            <div class="col-md-4 strong">Head of Office:</div>
                            <div class="col-md-8"><?php echo get_metadata('post', $location->ID, 'head-of-office', true); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 strong">DX:</div>
                            <div class="col-md-8"><?php echo get_metadata('post', $location->ID, 'location-dx', true); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 strong">Telephone:</div>
                            <div class="col-md-8"><?php echo get_metadata('post', $location->ID, 'location-tel', true); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 strong">Fax:</div>
                            <div class="col-md-8"><?php echo get_metadata('post', $location->ID, 'location-fax', true); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 strong">Email:</div>
                            <div class="col-md-8"><a href="mailto:<?php echo get_metadata('post', $location->ID, 'location-email', true); ?>"><?php echo get_metadata('post', $location->ID, 'location-email', true); ?></a></div>
                        </div>
                    </div>
                </div>
            </article>
<?php } ?>
    </div>
</div>