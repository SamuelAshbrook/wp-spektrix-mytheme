<?php
/**
 * WP Spektrix MyTheme - Plugin Class
 *
 * @package Step3\WpSpektrixMytheme
 * @version 1.0.0
 */

namespace Step3\WpSpektrixMytheme;

defined( 'ABSPATH' ) || exit;

/**
 * Plugin class.
 *
 * @since 1.0.0
 */
class Plugin {

    protected static ?self $instance = null;

    protected ?string $entry_point = null;

    public static function get_instance(): self {
        if ( is_null( self::$instance ) ) {
           self::$instance = new self();
        }
  
        return self::$instance;
    }

    /**
	 * Run the plugin
	 */
    public static function run( string $entry_point ): self {
   
        $plugin = self::get_instance();
        
        $plugin->entry_point = $entry_point;
  
        register_activation_hook( $entry_point, function () {
           Activator::activate();
        } );
  
        register_deactivation_hook( $entry_point, function () {
            Deactivator::deactivate();
        } );
        
        add_action( 'init', function() {
            Functions::frontend_changes();
        } );

        return $plugin;

    }

}