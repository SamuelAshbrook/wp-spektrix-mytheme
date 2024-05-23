<?php
/**
 * WP Spektrix MyTheme - Functions Class
 *
 * @package Step3\WpSpektrixMytheme
 * @version 1.0.0
 */

namespace Step3\WpSpektrixMytheme;

defined( 'ABSPATH' ) || exit;

/**
 * Functions class.
 *
 * @since 1.0.0
 */
class Functions {

    public static function frontend_changes() {
        // Add your frontend changes here
        add_action( 'wp_spektrix_single_event_content', function() {
            echo '<p>Here is the single event content</p>';
        }, 11 );
    }
}