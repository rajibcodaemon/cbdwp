<?php

namespace FedExVendor\WPDesk\Plugin\Flow\Initialization;

/**
 * Interface for factory of plugin initialization strategy
 */
interface InitializationFactory
{
    /**
     * @param \WPDesk_Plugin_Info $info
     *
     * @return InitializationStrategy
     */
    public function create_initialization_strategy(\FedExVendor\WPDesk_Plugin_Info $info);
}
