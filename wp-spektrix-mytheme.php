<?php
/**
 * Plugin Name: WP Spektrix MyTheme
 * Description: Customise the WP Spektrix plugin for mytheme
 * Version: 1.0.0
 * Author: Step3 Digital
 * Author URI: https://step3.digital/
 * Developer: smams
 * Developer URI: https://samuelashbrook.com/
 * Text Domain: wp-spektrix-mytheme
 * Domain Path: /languages
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

use Step3\WpSpektrixMytheme\Autoloader;
use Step3\WpSpektrixMytheme\Plugin;

// If this file is called directly, abort.
defined('ABSPATH') || exit;

/**
 * Load and initialise the autoloader
 */
require_once __DIR__ . '/src/Autoloader.php';
if ( ! Autoloader::init() ) {
    return;
}

// Plugin path and URL
define( 'WP_SPEKTRIX_MYTHEME_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WP_SPEKTRIX_MYTHEME_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Begins execution of the plugin.
 */

if ( in_array( 'wp-spektrix/wp-spektrix.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    Plugin::run( __FILE__ );
} else {
    add_action( 'admin_notices', function() {
        ?>
        <div class="notice notice-error is-dismissible">
            <p><?php esc_html_e( 'WP Spektrix MyTheme requires the WP Spektrix plugin to be installed and activated.', 'wp-spektrix-mytheme' ); ?></p>
        </div>
        <?php
    } );
}