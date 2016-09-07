<?php

/**
 * Script to migrate OptionTree file fields to ACF.
 * Run: wp eval-file wp-content/themes/public-defender/cli-scripts/migrate-to-acf.php
 */

global $wpdb;

/**
 * Get an attachment ID given a URL.
 *
 * @param string $url
 *
 * @return int Attachment ID on success, 0 on failure
 */
function get_attachment_id($url) {
    global $wpdb;

    $sql = "SELECT `ID`
            FROM {$wpdb->posts}
            WHERE `guid` = %s";
    $sql = $wpdb->prepare($sql, $url);

    $query = $wpdb->get_results($sql);

    if (count($query) > 0) {
        return $query[0]->ID;
    }
    else {
        return false;
    }
}

/**
 * Migrate fields
 */

$query = "SELECT *
          FROM {$wpdb->postmeta}
          WHERE `meta_key` = 'advocate-cv'
          AND `meta_value` LIKE 'http%'";

$records = $wpdb->get_results($query);

foreach ($records as $record) {
    $attachment_id = get_attachment_id($record->meta_value);

    if ($attachment_id) {
        update_post_meta($record->post_id, $record->meta_key, $attachment_id, $record->meta_value);
        echo "Migrated meta for post ID {$record->post_id}\n";
    }
}
