<?php

namespace FedExVendor\WPDesk\Composer\Codeception;

use FedExVendor\WPDesk\Composer\Codeception\Commands\CreateCodeceptionTests;
use FedExVendor\WPDesk\Composer\Codeception\Commands\RunCodeceptionTests;
/**
 * Links plugin commands handlers to composer.
 */
class CommandProvider implements \FedExVendor\Composer\Plugin\Capability\CommandProvider
{
    public function getCommands()
    {
        return [new \FedExVendor\WPDesk\Composer\Codeception\Commands\CreateCodeceptionTests(), new \FedExVendor\WPDesk\Composer\Codeception\Commands\RunCodeceptionTests()];
    }
}
