<?php

namespace FedExVendor\FedEx\TrackService\ComplexType;

use FedExVendor\FedEx\AbstractComplexType;
/**
 * Driving or other transportation distances, distinct from dimension measurements.
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Package Movement Information Service
 *
 * @property float $Value
 * @property \FedEx\TrackService\SimpleType\DistanceUnits|string $Units
 */
class Distance extends \FedExVendor\FedEx\AbstractComplexType
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $name = 'Distance';
    /**
     * Identifies the distance quantity.
     *
     * @param float $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->values['Value'] = $value;
        return $this;
    }
    /**
     * Identifies the unit of measure for the distance value.
     *
     * @param \FedEx\TrackService\SimpleType\DistanceUnits|string $units
     * @return $this
     */
    public function setUnits($units)
    {
        $this->values['Units'] = $units;
        return $this;
    }
}
