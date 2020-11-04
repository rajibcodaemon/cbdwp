<?php

namespace FedExVendor\FedEx\DGDSService\ComplexType;

use FedExVendor\FedEx\AbstractComplexType;
/**
 * The descriptive data for the heaviness of an object.
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Dangerous Goods Data Service
 *
 * @property \FedEx\DGDSService\SimpleType\WeightUnits|string $Units
 * @property float $Value
 */
class Weight extends \FedExVendor\FedEx\AbstractComplexType
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $name = 'Weight';
    /**
     * Identifies the unit of measure associated with a weight value.
     *
     * @param \FedEx\DGDSService\SimpleType\WeightUnits|string $units
     * @return $this
     */
    public function setUnits($units)
    {
        $this->values['Units'] = $units;
        return $this;
    }
    /**
     * Identifies the weight value of a package/shipment.
     *
     * @param float $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->values['Value'] = $value;
        return $this;
    }
}
