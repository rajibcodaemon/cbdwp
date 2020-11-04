<?php
/**
 * Settings sidebar.
 *
 * @package WPDesk\FlexibleShippingFedex
 */

namespace WPDesk\FlexibleShippingFedex;

use FedExVendor\WPDesk\PluginBuilder\Plugin\Hookable;

/**
 * Can display settings sidebar.
 */
class SettingsSidebar implements Hookable {

	/**
	 * Hooks.
	 */
	public function hooks() {
		add_action( 'flexible_shipping_fedex_settings_sidebar', [ $this, 'maybe_display_settings_sidebar' ] );
	}

	/**
	 * Maybe display settings sidebar.
	 */
	public function maybe_display_settings_sidebar() {
		if ( ! defined( 'FLEXIBLE_SHIPPING_FEDEX_PRO_VERSION' ) ) {
			$pro_url  = 'pl_PL' === get_locale() ? 'https://www.wpdesk.pl/sklep/fedex-woocommerce/' : 'https://flexibleshipping.com/products/flexible-shipping-fedex-pro/';
			$pro_url .= '?utm_source=fedex-settings&utm_medium=link&utm_campaign=settings-upgrade-link';
			include __DIR__ . '/view/settings-sidebar-html.php';
		}
	}

}