<?php

/**
 * Estimated delivery dates display.
 *
 * @package WPDesk\WooCommerceShipping\EstimatedDelivery
 */
namespace FedExVendor\WPDesk\WooCommerceShipping\EstimatedDelivery;

use FedExVendor\WPDesk\PluginBuilder\Plugin\Hookable;
use FedExVendor\WPDesk\View\Renderer\Renderer;
use FedExVendor\WPDesk\WooCommerceShipping\ShippingMethod;
/**
 * Can display estimated delivery dates and times on checkout.
 */
class EstimatedDeliveryDatesDisplay implements \FedExVendor\WPDesk\PluginBuilder\Plugin\Hookable
{
    const DELIVERY_DATES = 'delivery_dates';
    const OPTION_NONE = 'none';
    const OPTION_DELIVERY_DATE = 'delivery_date';
    const OPTION_DAYS_TO_ARRIVAL_DATE = 'days_to_arrival_date';
    /**
     * Renderer.
     *
     * @var Renderer
     */
    private static $renderer;
    /**
     * Shipping method.
     *
     * @var ShippingMethod
     */
    private $shipping_method;
    /**
     * Instance id.
     *
     * @var int
     */
    private $instance_id;
    /**
     * Already rendered delivery dates.
     *
     * @var string[]
     */
    private $rendered_delivery_dates = array();
    /**
     * Set renderer.
     *
     * @param Renderer $renderer
     */
    public static function set_renderer(\FedExVendor\WPDesk\View\Renderer\Renderer $renderer)
    {
        self::$renderer = $renderer;
    }
    /**
     * Hooks.
     */
    public function hooks()
    {
        \add_action('woocommerce_after_shipping_rate', array($this, 'display_estimated_delivery_time_for_method_if_enabled_and_present'), 10, 2);
        \add_action('woocommerce_hidden_order_itemmeta', array($this, 'add_hidden_order_item_meta'), 10);
    }
    /**
     * Display delivery time for method.
     *
     * @param \WC_Shipping_Rate $shipping_rate Shipping rate.
     * @param int               $index Index.
     */
    public function display_estimated_delivery_time_for_method_if_enabled_and_present($shipping_rate, $index)
    {
        $meta_data = $shipping_rate->get_meta_data();
        if (isset($meta_data[self::DELIVERY_DATES]) && $meta_data[self::DELIVERY_DATES] !== self::OPTION_NONE) {
            $this->display_estimated_delivery_time_for_method_if_present($shipping_rate, $meta_data[self::DELIVERY_DATES]);
        }
    }
    /**
     * Display delivery time for method if present.
     *
     * @param \WC_Shipping_Rate $shipping_rate.
     * @param string $delivery_dates_settings .
     */
    private function display_estimated_delivery_time_for_method_if_present($shipping_rate, $delivery_dates_settings)
    {
        $meta_data = $shipping_rate->get_meta_data();
        if ($delivery_dates_settings === self::OPTION_DAYS_TO_ARRIVAL_DATE && isset($meta_data[\FedExVendor\WPDesk\WooCommerceShipping\EstimatedDelivery\EstimatedDeliveryMetaDataBuilder::DAYS_TO_DELIVERY_DATE])) {
            $params = ['days_to_arrival_date' => $meta_data[\FedExVendor\WPDesk\WooCommerceShipping\EstimatedDelivery\EstimatedDeliveryMetaDataBuilder::DAYS_TO_DELIVERY_DATE]];
            echo self::$renderer->render('after-shipping-rate-days-to-arrival', $params);
        }
        if ($delivery_dates_settings === self::OPTION_DELIVERY_DATE && isset($meta_data[\FedExVendor\WPDesk\WooCommerceShipping\EstimatedDelivery\EstimatedDeliveryMetaDataBuilder::ESTIMATED_DELIVERY_DATE])) {
            $params = ['delivery_date' => $meta_data[\FedExVendor\WPDesk\WooCommerceShipping\EstimatedDelivery\EstimatedDeliveryMetaDataBuilder::ESTIMATED_DELIVERY_DATE]];
            echo self::$renderer->render('after-shipping-rate-delivery-date', $params);
        }
        $this->rendered_delivery_dates[] = $shipping_rate->get_id();
    }
    /**
     * Add hidden order item meta.
     *
     * @param array $hidden_order_item_meta .
     *
     * @return array
     */
    public function add_hidden_order_item_meta($hidden_order_item_meta)
    {
        $hidden_order_item_meta[] = \FedExVendor\WPDesk\WooCommerceShipping\EstimatedDelivery\EstimatedDeliveryMetaDataBuilder::BUSINESS_DAYS_IN_TRANSIT;
        $hidden_order_item_meta[] = \FedExVendor\WPDesk\WooCommerceShipping\EstimatedDelivery\EstimatedDeliveryMetaDataBuilder::ESTIMATED_DELIVERY_DATE;
        $hidden_order_item_meta[] = \FedExVendor\WPDesk\WooCommerceShipping\EstimatedDelivery\EstimatedDeliveryMetaDataBuilder::DAYS_TO_DELIVERY_DATE;
        $hidden_order_item_meta[] = \FedExVendor\WPDesk\WooCommerceShipping\EstimatedDelivery\EstimatedDeliveryDatesDisplay::DELIVERY_DATES;
        return $hidden_order_item_meta;
    }
}
