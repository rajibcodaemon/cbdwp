<?php

namespace FedExVendor\FedEx\RateService\ComplexType;

use FedExVendor\FedEx\AbstractComplexType;
/**
 * Solid (filled) rectangular area on label.
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Rate Service
 *
 * @property CustomLabelPosition $TopLeftCorner
 * @property CustomLabelPosition $BottomRightCorner
 */
class CustomLabelBoxEntry extends \FedExVendor\FedEx\AbstractComplexType
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $name = 'CustomLabelBoxEntry';
    /**
     * Set TopLeftCorner
     *
     * @param CustomLabelPosition $topLeftCorner
     * @return $this
     */
    public function setTopLeftCorner(\FedExVendor\FedEx\RateService\ComplexType\CustomLabelPosition $topLeftCorner)
    {
        $this->values['TopLeftCorner'] = $topLeftCorner;
        return $this;
    }
    /**
     * Set BottomRightCorner
     *
     * @param CustomLabelPosition $bottomRightCorner
     * @return $this
     */
    public function setBottomRightCorner(\FedExVendor\FedEx\RateService\ComplexType\CustomLabelPosition $bottomRightCorner)
    {
        $this->values['BottomRightCorner'] = $bottomRightCorner;
        return $this;
    }
}
