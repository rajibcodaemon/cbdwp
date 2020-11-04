<?php

namespace FedExVendor\FedEx\PickupService\ComplexType;

use FedExVendor\FedEx\AbstractComplexType;
/**
 * ReturnEMailDetail
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Pickup Service
 *
 * @property string $MerchantPhoneNumber
 * @property \FedEx\PickupService\SimpleType\ReturnEMailAllowedSpecialServiceType|string[] $AllowedSpecialServices
 */
class ReturnEMailDetail extends \FedExVendor\FedEx\AbstractComplexType
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $name = 'ReturnEMailDetail';
    /**
     * Set MerchantPhoneNumber
     *
     * @param string $merchantPhoneNumber
     * @return $this
     */
    public function setMerchantPhoneNumber($merchantPhoneNumber)
    {
        $this->values['MerchantPhoneNumber'] = $merchantPhoneNumber;
        return $this;
    }
    /**
     * Identifies the allowed (merchant-authorized) special services which may be selected when the subsequent shipment is created. Only services represented in EMailLabelAllowedSpecialServiceType will be controlled by this list.
     *
     * @param \FedEx\PickupService\SimpleType\ReturnEMailAllowedSpecialServiceType[]|string[] $allowedSpecialServices
     * @return $this
     */
    public function setAllowedSpecialServices(array $allowedSpecialServices)
    {
        $this->values['AllowedSpecialServices'] = $allowedSpecialServices;
        return $this;
    }
}
