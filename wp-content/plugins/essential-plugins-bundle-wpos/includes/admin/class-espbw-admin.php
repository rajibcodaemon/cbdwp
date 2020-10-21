<?php
/**
 * Admin Class
 * Handles the Admin side functionality of plugin
 *
 * @package Essential Plugins Bundle
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class ESPBW_Admin {

	function __construct() {

		// Action to register admin menu
		add_action( 'admin_menu', array($this, 'espbw_register_menu') );
	}

	/**
	 * Function to register admin menus
	 * 
	 * @since 1.0
	 */
	function espbw_register_menu() {

		// Dashboard Page
		add_menu_page( __('Essential Plugins Bundle By WP OnlineSuport', 'espbw'), __('Essential Plugins Bundle', 'espbw'), 'manage_options', 'espbw-dashboard', array($this, 'espbw_dashboard_page'), ESPBW_URL."assets/images/essential-plugin-16.png" );
	}

	/**
	 * Render Plugin Dashboard Page
	 * 
	 * @since 1.0
	 */
	function espbw_dashboard_page() {
		include_once( ESPBW_DIR . '/includes/admin/views/dashboard.php' );
	}
}

$espbw_admin = new ESPBW_Admin();