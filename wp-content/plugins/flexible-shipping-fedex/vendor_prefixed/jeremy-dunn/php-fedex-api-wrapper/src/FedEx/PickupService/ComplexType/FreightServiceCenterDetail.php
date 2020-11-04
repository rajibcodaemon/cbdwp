<?php

namespace FedExVendor\FedEx\PickupService\ComplexType;

use FedExVendor\FedEx\AbstractComplexType;
/**
 * This class describes the relationship between a customer-specified address and the FedEx Freight / FedEx National Freight Service Center that supports that address.
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Pickup Service
 *
 * @property string $InterlineCarrierCode
 * @property string $InterlineCarrierName
 * @property int $AdditionalDays
 * @property \FedEx\PickupService\SimpleType\ServiceType|string $LocalService
 * @property Distance $LocalDistance
 * @property string $LocalDuration
 * @property \FedEx\PickupService\SimpleType\FreightServiceSchedulingType|string $LocalServiceScheduling
 * @property \FedEx\PickupService\SimpleType\DayOfWeekType|string[] $LimitedServiceDays
 * @property string $GatewayLocationId
 * @property string $Location
 * @property ContactAndAddress $ContactAndAddress
 */
class FreightServiceCenterDetail extends \FedExVendor\FedEx\AbstractComplexType
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $name = 'FreightServiceCenterDetail';
    /**
     * Freight Industry standard non-FedEx carrier identification
     *
     * @param string $interlineCarrierCode
     * @return $this
     */
    public function setInterlineCarrierCode($interlineCarrierCode)
    {
        $this->values['InterlineCarrierCode'] = $interlineCarrierCode;
        return $this;
    }
    /**
     * The name of the Interline carrier.
     *
     * @param string $interlineCarrierName
     * @return $this
     */
    public function setInterlineCarrierName($interlineCarrierName)
    {
        $this->values['InterlineCarrierName'] = $interlineCarrierName;
        return $this;
    }
    /**
     * Additional time it might take at the origin or destination to pickup or deliver the freight. This is usually due to the remoteness of the location. This time is included in the total transit time.
     *
     * @param int $additionalDays
     * @return $this
     */
    public function setAdditionalDays($additionalDays)
    {
        $this->values['AdditionalDays'] = $additionalDays;
        return $this;
    }
    /**
     * Service branding which may be used for local pickup or delivery, distinct from service used for line-haul of customer's shipment.
     *
     * @param \FedEx\PickupService\SimpleType\ServiceType|string $localService
     * @return $this
     */
    public function setLocalService($localService)
    {
        $this->values['LocalService'] = $localService;
        return $this;
    }
    /**
     * Distance between customer address (pickup or delivery) and the supporting Freight / National Freight service center.
     *
     * @param Distance $localDistance
     * @return $this
     */
    public function setLocalDistance(\FedExVendor\FedEx\PickupService\ComplexType\Distance $localDistance)
    {
        $this->values['LocalDistance'] = $localDistance;
        return $this;
    }
    /**
     * Time to travel between customer address (pickup or delivery) and the supporting Freight / National Freight service center.
     *
     * @param string $localDuration
     * @return $this
     */
    public function setLocalDuration($localDuration)
    {
        $this->values['LocalDuration'] = $localDuration;
        return $this;
    }
    /**
     * Specifies when/how the customer can arrange for pickup or delivery.
     *
     * @param \FedEx\PickupService\SimpleType\FreightServiceSchedulingType|string $localServiceScheduling
     * @return $this
     */
    public function setLocalServiceScheduling($localServiceScheduling)
    {
        $this->values['LocalServiceScheduling'] = $localServiceScheduling;
        return $this;
    }
    /**
     * Specifies days of operation if localServiceScheduling is LIMITED.
     *
     * @param \FedEx\PickupService\SimpleType\DayOfWeekType[]|string[] $limitedServiceDays
     * @return $this
     */
    public function setLimitedServiceDays(array $limitedServiceDays)
    {
        $this->values['LimitedServiceDays'] = $limitedServiceDays;
        return $this;
    }
    /**
     * Freight service center that is a gateway on the border of Canada or Mexico.
     *
     * @param string $gatewayLocationId
     * @return $this
     */
    public function setGatewayLocationId($gatewayLocationId)
    {
        $this->values['GatewayLocationId'] = $gatewayLocationId;
        return $this;
    }
    /**
     * Alphabetical code identifying a Freight Service Center
     *
     * @param string $location
     * @return $this
     */
    public function setLocation($location)
    {
        $this->values['Location'] = $location;
        return $this;
    }
    /**
     * Freight service center Contact and Address
     *
     * @param ContactAndAddress $contactAndAddress
     * @return $this
     */
    public function setContactAndAddress(\FedExVendor\FedEx\PickupService\ComplexType\ContactAndAddress $contactAndAddress)
    {
        $this->values['ContactAndAddress'] = $contactAndAddress;
        return $this;
    }
}
