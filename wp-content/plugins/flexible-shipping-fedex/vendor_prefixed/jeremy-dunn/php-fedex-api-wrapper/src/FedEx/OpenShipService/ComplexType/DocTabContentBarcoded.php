<?php

namespace FedExVendor\FedEx\OpenShipService\ComplexType;

use FedExVendor\FedEx\AbstractComplexType;
/**
 * DocTabContentBarcoded
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  OpenShip Service
 *
 * @property \FedEx\OpenShipService\SimpleType\BarcodeSymbologyType|string $Symbology
 * @property DocTabZoneSpecification $Specification
 */
class DocTabContentBarcoded extends \FedExVendor\FedEx\AbstractComplexType
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $name = 'DocTabContentBarcoded';
    /**
     * Set Symbology
     *
     * @param \FedEx\OpenShipService\SimpleType\BarcodeSymbologyType|string $symbology
     * @return $this
     */
    public function setSymbology($symbology)
    {
        $this->values['Symbology'] = $symbology;
        return $this;
    }
    /**
     * Set Specification
     *
     * @param DocTabZoneSpecification $specification
     * @return $this
     */
    public function setSpecification(\FedExVendor\FedEx\OpenShipService\ComplexType\DocTabZoneSpecification $specification)
    {
        $this->values['Specification'] = $specification;
        return $this;
    }
}
