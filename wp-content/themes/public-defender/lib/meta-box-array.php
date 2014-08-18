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
        'slug' => 'advocates',
        'id' => 'news-meta-box',
        'title' => 'News',
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'id' => 'news-entries',
                'label' => 'News Entries',
                'type' => 'list-item',
                'settings' => array(
                    array('id' => 'body', 'label' => 'News text', 'type' => 'textarea'),
                    array('id' => 'date', 'label' => 'Date', 'type' => 'date_picker')
                )
            )
        )
    ), // news-meta-box
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
            )
        )
    ), // advocate-meta-box
    array(
        'id' => 'location-meta-box',
        'title' => 'Location Details',
        'pages' => array('location'),
        'context' => 'normal',
        'priority' => 'default',
        'fields' => array(
            array(
                'id' => 'location-address',
                'label' => 'Address',
                'type' => 'textarea',
            ),
            array(
                'id' => 'location-postcode',
                'label' => 'Postcode',
                'type' => 'text'
            ),
            array(
                'id' => 'location-dx',
                'label' => 'DX',
                'type' => 'text'
            ),
            array(
                'id' => 'location-tel',
                'label' => 'Telephone',
                'type' => 'text'
            ),
            array(
                'id' => 'location-fax',
                'label' => 'Fax',
                'type' => 'text'
            ),
            array(
                'id' => 'location-email',
                'label' => 'Email',
                'type' => 'text'
            )
        )
    ), // location-meta-box
    array(
        'id' => 'lawyers-meta-box',
        'title' => 'Lawyer Details',
        'pages' => array('location'),
        'context' => 'normal',
        'priority' => 'default',
        'fields' => array(
            array(
                'id' => 'head-of-office',
                'label' => 'Head of Ofice',
                'type' => 'text'
            ),
            array(
                'id' => 'solicitor-advocates',
                'label' => 'Solicitor Advocates',
                'type' => 'list-item',
                'settings' => array(
                )
            ),
            array(
                'id' => 'duty-solicitors',
                'label' => 'Duty Solicitors',
                'type' => 'list-item',
                'settings' => array()
            ),
            array(
                'id' => 'police-reps',
                'label' => 'Accredited Police Station Representatives',
                'type' => 'list-item',
                'settings' => array()
            )
        )
    ), // location-meta-box
);
