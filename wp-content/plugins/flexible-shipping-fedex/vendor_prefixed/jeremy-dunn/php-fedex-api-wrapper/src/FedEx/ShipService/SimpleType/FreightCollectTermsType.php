<?php

namespace FedExVendor\FedEx\ShipService\SimpleType;

use FedExVendor\FedEx\AbstractSimpleType;
/**
 * FreightCollectTermsType
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Ship Service
 */
class FreightCollectTermsType extends \FedExVendor\FedEx\AbstractSimpleType
{
    const _NON_RECOURSE_SHIPPER_SIGNED = 'NON_RECOURSE_SHIPPER_SIGNED';
    const _STANDARD = 'STANDARD';
}
