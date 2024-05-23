<?php
/**
 * WP Spektrix MyTheme - Deactivator Class
 *
 * @package Step3\WpSpektrixMytheme
 * @version 1.0.0
 */

namespace Step3\WpSpektrixMytheme;

defined( 'ABSPATH' ) || exit;

/**
 * Deactivator class.
 *
 * @since 1.0.0
 */
class Deactivator {

    /**
	 * Static-only class.
	 */
    public static function deactivate() {
        flush_rewrite_rules();
    }

}