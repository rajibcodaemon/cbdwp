<?php
/**
 * Plugin Name: Essential Plugins Bundle
 * Plugin URI: https://www.wponlinesupport.com/plugins/
 * Description: Essential plugins for your website by WP OnlineSupport. Essential plugins from header to footer for your website.
 * Author: WP Online Support
 * Version: 1.0
 * Author URI: https://www.wponlinesupport.com
 * Text Domain: espbw
 * Domain Path: /languages/
 *
 * @package Essential Plugins Bundle
 * @author WP Online Support
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( ! defined( 'ESPBW_VERSION' ) ) {
	define( 'ESPBW_VERSION', '1.0' ); // Version of plugin
}
if( ! defined( 'ESPBW_DIR' ) ) {
	define( 'ESPBW_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( ! defined( 'ESPBW_URL' ) ) {
	define( 'ESPBW_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( ! defined( 'ESPBW_PLUGIN_BASENAME' ) ) {
	define( 'ESPBW_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); // Plugin base name
}

/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @since 1.0
 */
function espbw_load_textdomain() {

	global $wp_version;

	// Set filter for plugin's languages directory
	$espbw_lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
	$espbw_lang_dir = apply_filters( 'espbw_languages_directory', $espbw_lang_dir );

	// Traditional WordPress plugin locale filter.
	$get_locale = get_locale();

	if ( $wp_version >= 4.7 ) {
		$get_locale = get_user_locale();
	}

	// Traditional WordPress plugin locale filter
	$locale = apply_filters( 'plugin_locale',  $get_locale, 'espbw' );
	$mofile = sprintf( '%1$s-%2$s.mo', 'espbw', $locale );

	// Setup paths to current locale file
	$mofile_global  = WP_LANG_DIR . '/plugins/' . basename( ESPBW_DIR ) . '/' . $mofile;

	if ( file_exists( $mofile_global ) ) { // Look in global /wp-content/languages/plugin-name folder
		load_textdomain( 'espbw', $mofile_global );
	} else { // Load the default language files
		load_plugin_textdomain( 'espbw', false, $espbw_lang_dir );
	}
}

/**
 * Do stuff once all the plugin has been loaded
 * 
 * @since 1.0
 */
function espbw_plugins_loaded() {

	espbw_load_textdomain();

	// Defining page slug after localization
	if( ! defined( 'ESPBW_SCREEN_ID' ) ) {
		define( 'ESPBW_SCREEN_ID', sanitize_title(__('Essential Plugins Bundle', 'espbw')) );
	}
}
add_action('plugins_loaded', 'espbw_plugins_loaded');

/**
 * Activation Hook
 * Register plugin activation hook.
 * 
 * @since 1.0
 */
register_activation_hook( __FILE__, 'espbw_install' );

/**
 * Deactivation Hook
 * Register plugin deactivation hook.
 * 
 * @since 1.0
 */
register_deactivation_hook( __FILE__, 'espbw_uninstall' );

/**
 * Plugin Setup (On Activation)
 * Does the initial setup, Set default values for the plugin options.
 * 
 * @since 1.0
 */
function espbw_install() {
}

/**
 * Plugin Setup (On Deactivation)
 * Delete  plugin options.
 * 
 * @since 1.0
 */
function espbw_uninstall() {
	// Deactivate functionality
}

/***** Include Some Files *****/

// If admin screen is there
if ( is_admin() ) {

	// Functions file
	require_once( ESPBW_DIR . '/includes/espbw-functions.php' );

	// Script Class
	require_once( ESPBW_DIR . '/includes/class-espbw-script.php' );

	// Admin Class
	require_once( ESPBW_DIR . '/includes/admin/class-espbw-admin.php' );

	// Analytics
	require_once( ESPBW_DIR . '/analytics.php' );
}