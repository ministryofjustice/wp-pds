<?php

add_action('wp_ajax_newsletter_form', 'newsletter_form');
add_action('wp_ajax_nopriv_newsletter_form', 'newsletter_form');

function newsletter_form() {
    global $wpdb;

    $email_table = $wpdb->prefix . "newsletteremails";

    if ($wpdb->get_var("SHOW TABLES LIKE '$email_table'") != $email_table) {
        $charset_collate = '';
        if (!empty($wpdb->charset)) {
            $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
        }

        if (!empty($wpdb->collate)) {
            $charset_collate .= " COLLATE {$wpdb->collate}";
        }

        $sql = "CREATE TABLE $email_table (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        email tinytext NOT NULL, 
       UNIQUE KEY id (id)
      ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }

    if (strlen($_POST['email']) == 0) {
        $return = "error-no-email";
    } else {
        $exists = $wpdb->get_var("SELECT COUNT(*) FROM " . $email_table . " WHERE email = '" . $_POST["email"] . "'");
        if ($exists == 0) {
            $return = $wpdb->insert(
                    $email_table, array(
                'time' => current_time('mysql'),
                'email' => sanitize_text_field($_POST['email'])
                    )
            );
        } else {
            $return = "error-email-exists";
        }
    }

    echo $return;
    
    die();
}
