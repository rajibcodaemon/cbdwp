<?php
/**
 * Script Class
 * Handles the script and style functionality of plugin
 *
 * @package Essential Plugins Bundle
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class ESPBW_Script {

	function __construct() {

		// Action to add style at admin side
		add_action( 'admin_enqueue_scripts', array($this, 'espbw_admin_script_style') );
	}

	/**
	 * Function to add script and style at admin side
	 * 
	 * @since 1.0
	 */
	function espbw_admin_script_style( $hook ) {

		// Taking pages array
		$pages_arr = array( 'toplevel_page_espbw-dashboard' );

		// Registring admin css
		wp_register_style( 'espbw-admin-css', ESPBW_URL.'assets/css/admin-style.css', array(), ESPBW_VERSION );

		// Registring admin script
		wp_register_script( 'espbw-admin-script', ESPBW_URL.'assets/js/admin-script.js', array('jquery'), ESPBW_VERSION, true );

		// Olny for dashboard screen
		if( $hook == 'toplevel_page_espbw-dashboard' ) {

			wp_enqueue_script( 'plugin-install' );
			wp_enqueue_script( 'updates' );
			wp_localize_script( 'updates', '_wpUpdatesItemCounts', array(
																		'totals' => wp_get_update_data(),
																	));
			add_thickbox();
		}

		if( in_array( $hook, $pages_arr ) ) {

			// enqueing admin css
			wp_enqueue_style( 'espbw-admin-css' );

			// enqueing admin script
			wp_enqueue_script( 'espbw-admin-script' );
		}
	}
}

$espbw_script = new ESPBW_Script();