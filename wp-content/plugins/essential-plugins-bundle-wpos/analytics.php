<?php
/**
 * Initialize Analytics
 * 
 * @since 1.0
 */

/* Plugin Wpos Analytics Data Starts */
function wpos_analytics_anl99_load() {

	require_once dirname( __FILE__ ) . '/wpos-analytics/wpos-analytics.php';

	$wpos_analytics = wpos_anylc_init_module( array(
					'id'			=> 99,
					'file'			=> ESPBW_PLUGIN_BASENAME,
					'name'			=> 'Essential Plugins Bundle',
					'slug'			=> 'essential-plugins-bundle',
					'type'			=> 'plugin',
					'menu'			=> 'espbw-dashboard',
					'text_domain'	=> 'espbw',
				));

	return $wpos_analytics;
}

// Init Analytics
wpos_analytics_anl99_load();