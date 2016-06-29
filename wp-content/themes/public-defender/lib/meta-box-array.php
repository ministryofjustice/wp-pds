<?php

// Array hold all meta-boxes - slug param is custom to control which page it appears on
// To use on specific page template, use: 'slug' => get_template_pages('template-name')
$meta_boxes = array(
    array(
        'id' => 'advocate-meta-box',
        'title' => 'Advocate Details',
        'pages' => array('advocate'),
        'context' => 'normal',
        'priority' => 'default',
        'fields' => array(
            array(
                'id' => 'advocate-surname',
                'label' => 'Surname (for sorting)',
                'type' => 'text',
            ),
            array(
              'id' => 'advocate-call',
                'label' => 'Year called',
                'type' => 'text'
            ),
            array(
              'id' => 'advocate-silk',
                'label' => 'Year silks received',
                'type' => 'text'
            ),
            array(
                'id' => 'advocate-brief',
                'label' => 'Brief details',
                'type' => 'text',
            ),
            array(
                'id' => 'advocate-cv',
                'label' => 'Advocate CV',
                'type' => 'upload'
            ),
            array(
                'id' => 'advocate-show',
                'label' => 'Show advocate on banner',
                'desc'=> 'By selecting this box you are choosing to show this advocate on the Advocate Homepage banner',
                'type' => 'on-off'
            )
        )
    ),
);
