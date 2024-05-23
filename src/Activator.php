<?php
/**
 * WP Spektrix MyTheme - Activator Class
 *
 * @package Step3\WpSpektrixMytheme
 * @version 1.0.0
 */

namespace Step3\WpSpektrixMytheme;

defined( 'ABSPATH' ) || exit;

/**
 * Activator class.
 *
 * @since 1.0.0
 */
class Activator {

    public static function activate() {
        flush_rewrite_rules();
    }

}