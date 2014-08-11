<?php

// Array hold all meta-boxes - slug param is custom to control which page it appears on
$meta_boxes = array(
    array(
        'slug' => get_template_pages('faq'),
        'id' => 'faq-meta-box',
        'title' => 'Frequently Asked Questions',
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'id' => 'faq-entries',
                'label' => 'FAQ Entries',
                'type' => 'list-item',
                'settings' => array(
                    array('id' => 'answer', 'label' => 'Answer', 'type' => 'textarea')
                )
            )
        )
    ), // faq-meta-box
    array(
        'id' => 'advocate-meta-box',
        'title' => 'Advocate Details',
        'pages' => array('advocate'),
        'context' => 'normal',
        'priority' => 'default',
        'fields' => array(
            array(
                'id' => 'advocate-brief',
                'label' => 'Brief details',
                'type' => 'text',
            ),
            array(
                'id' => 'advocate-cv',
                'label' => 'Advocate CV',
                'type' => 'upload'
            )
        )
    ), // advocate-meta-box
);
