<?php

namespace FedExVendor\FedEx\RateService\SimpleType;

use FedExVendor\FedEx\AbstractSimpleType;
/**
 * Specifies the measure of quantity to be validated against a prescribed limit.
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Rate Service
 */
class HazardousCommodityQuantityType extends \FedExVendor\FedEx\AbstractSimpleType
{
    const _GROSS = 'GROSS';
    const _NET = 'NET';
}
