<?php
/**
 * WP Spektrix MyTheme - Autoloader Class
 *
 * @package Step3\WpSpektrixMytheme
 * @version 1.0.0
 */

namespace Step3\WpSpektrixMytheme;

defined( 'ABSPATH' ) || exit;

/**
 * Autoloader class.
 *
 * @since 1.0.0
 */
class Autoloader {

    /**
	 * Static-only class.
	 */
	private function __construct() {}

    /**
	 * Require the autoloader and return the result.
	 *
	 * If the autoloader is not present, log the failure and display an admin notice.
	 *
	 * @return boolean
	 */
	public static function init() {
		$autoloader = dirname( __DIR__ ) . '/vendor/autoload.php';

		if ( ! is_readable( $autoloader ) ) {
			self::missing_autoloader();
			return false;
		}

		$autoloader_result = require $autoloader;
		if ( ! $autoloader_result ) {
			return false;
		}

		return $autoloader_result;
	}

    /**
	 * If the autoloader is missing, add an admin notice.
	 */
	protected static function missing_autoloader() {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			error_log( // phpcs:ignore WordPress.PHP.DevelopmentFunctions
				esc_html__( 'Your installation of WP Spektrix MyTheme is incomplete. Autoloader is missing.', 'wp-spektrix-mytheme' )
			);
		}
		add_action(
			'admin_notices',
			function () {
				?>
				<div class="notice notice-error">
					<p>
						<?php
							esc_html_e( 'Your installation of WP Spektrix MyTheme is incomplete. Autoloader is missing.', 'wp-spektrix-mytheme' );
						?>
					</p>
				</div>
				<?php
			}
		);
	}

}