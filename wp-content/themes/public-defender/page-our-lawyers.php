<div id="page-header"></div>
<div class="page-header">
    <h1><?php the_title(); ?></h1>
</div>
<div class="row" id="locations-container">
    <div id="locations-header" class="col-md-12">
        <?php the_post(); the_content(); ?>
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
                    <div class="col-md-12">
                        <div class="row pad-bot-20">
                            <div class="col-md-6 strong"><?php echo ($location->post_title=="Cardiff (Admin Hub)"?"Site Contact":"Head of Office"); ?>:</div>
                            <div class="col-md-6">
                              <?php

                              $name = get_metadata('post', $location->ID, 'head-of-office', true);
                              $biography = get_metadata('post', $location->ID, 'head-of-office-biography', true);

                              if (!empty($biography)) {
                                echo '<a href="' . esc_url($biography) . '" title="' . esc_attr(sprintf("Read %s&rsquo;s biography", $name)) . '" target="_blank">';
                              }
                              echo $name;
                              if (!empty($biography)) {
                                echo '</a>';
                              }

                              ?>
                            </div>
                        </div>
                        <?php
                        $advocates_array = get_metadata('post', $location->ID, 'solicitor-advocates', true);
                        if ($advocates_array) {
                            ?>
                            <div class="row pad-bot-20">
                                <div class="col-md-6 strong">Solicitor Advocates:</div>
                                <div class="col-md-6">
                                    <?php
                                    foreach ($advocates_array as $person) {
                                      if (!empty($person['biography'])) {
                                        echo '<a href="' . esc_url($person['biography']) . '" title="' . esc_attr(sprintf("Read %s&rsquo;s biography", $person['title'])) . '" target="_blank">';
                                      }
                                      echo $person['title'];
                                      if (!empty($person['biography'])) {
                                        echo '</a>';
                                      }
                                      echo "<br>";
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php
                        $solicitors_array = get_metadata('post', $location->ID, 'duty-solicitors', true);
                        if ($solicitors_array) {
                            ?>
                            <div class="row pad-bot-20">
                                <div class="col-md-6 strong">Duty Solicitors:</div>
                                <div class="col-md-6">
                                    <?php
                                    foreach ($solicitors_array as $person) {
                                        if (!empty($person['biography'])) {
                                          echo '<a href="' . esc_url($person['biography']) . '" title="' . esc_attr(sprintf("Read %s&rsquo;s biography", $person['title'])) . '" target="_blank">';
                                        }
                                        echo $person['title'];
                                        if (!empty($person['biography'])) {
                                          echo '</a>';
                                        }
                                        echo "<br>";
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php
                        $apsr_array = get_metadata('post', $location->ID, 'police-reps', true);
                        if ($apsr_array) {
                            ?>
                            <div class="row pad-bot-20">
                                <div class="col-md-6 strong">Accredited Police Station Representatives:</div>
                                <div class="col-md-6">
                                    <?php
                                    foreach ($apsr_array as $person) {
                                      if (!empty($person['biography'])) {
                                        echo '<a href="' . esc_url($person['biography']) . '" title="' . esc_attr(sprintf("Read %s&rsquo;s biography", $person['title'])) . '" target="_blank">';
                                      }
                                      echo $person['title'];
                                      if (!empty($person['biography'])) {
                                        echo '</a>';
                                      }
                                      echo "<br>";
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>
</div>
