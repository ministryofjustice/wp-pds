<?php
/**
 * Template name: Our Advocates page
 */
the_post();
?>

<?php get_template_part('templates/page-header'); ?>

<?php the_content(); ?>

<section class="people-group">
    <h2>Head of Advocacy</h2>

    <div class="row">
        <?php

        $advocates = get_our_advocates_by_type(array('head-of-advocacy'));

        foreach ($advocates as $advocate):
            ?>
            <div class="col-md-8">
                <div class="row">
                    <?php

                    template_part('templates/person/person-wide', $advocate);

                    ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="people-group">
    <h2>QCs</h2>

    <div class="row">
        <?php

        $advocates = get_our_advocates_by_type(array('qc'), array('head-of-advocacy'));

        $i = 1;
        foreach ($advocates as $advocate) {
            $col_width = array(
                'md' => 2,
                'sm' => 3,
            );

            $vars = array_merge($advocate, compact('col_width'));
            template_part('templates/person/person-small', $vars);

            if ($i % 6 === 0) {
                echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
            }
            if ($i % 4 === 0) {
                echo '<div class="clearfix visible-sm-block"></div>';
            }
            if ($i % 2 === 0) {
                echo '<div class="clearfix visible-xs-block"></div>';
            }

            $i ++;
        }

        ?>
    </div>
</section>

<section class="people-group">
    <h2>Higher Court Advocates</h2>

    <div class="row">
        <?php

        $non_qc_advocates_args = array(
            'posts_per_page' => - 1,
            'post_type'      => 'advocate',
            'orderby' => array(
                'advocate-call' => 'ASC',
                'advocate-surname' => 'ASC',
            ),
            'meta_query'     => array(
                array(
                    'key'     => 'advocate-call',
                    'type'    => 'NUMERIC',
                    'value'   => '',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'     => 'advocate-surname',
                    'value'   => '',
                    'compare' => 'LIKE'
                )
            ),
            'tax_query'      => array(
                array(
                    'taxonomy' => 'advocate-type',
                    'field'    => 'slug',
                    'terms'    => array(
                        'senior-higher-courts-advocates',
                        'junior-higher-courts-advocates',
                    ),
                )
            )
        );

        $non_qc_advocates = new WP_Query($non_qc_advocates_args);

        $types = array(
            'senior-higher-courts-advocates',
            'junior-higher-courts-advocates',
        );
        $advocates = get_our_advocates_by_type($types);

        $i = 1;
        foreach ($advocates as $advocate) {
            $col_width = array(
                'md' => 2,
                'sm' => 3,
            );

            $vars = array_merge($advocate, compact('col_width'));
            template_part('templates/person/person-small', $vars);

            if ($i % 6 === 0) {
                echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
            }
            if ($i % 4 === 0) {
                echo '<div class="clearfix visible-sm-block"></div>';
            }
            if ($i % 2 === 0) {
                echo '<div class="clearfix visible-xs-block"></div>';
            }

            $i ++;
        }

        ?>
    </div>
</section>
