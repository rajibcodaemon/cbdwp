<?php

namespace FedExVendor\FedEx\ShipService\ComplexType;

use FedExVendor\FedEx\AbstractComplexType;
/**
 * Payment
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Ship Service
 *
 * @property \FedEx\ShipService\SimpleType\PaymentType|string $PaymentType
 * @property Payor $Payor
 */
class Payment extends \FedExVendor\FedEx\AbstractComplexType
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $name = 'Payment';
    /**
     * Set PaymentType
     *
     * @param \FedEx\ShipService\SimpleType\PaymentType|string $paymentType
     * @return $this
     */
    public function setPaymentType($paymentType)
    {
        $this->values['PaymentType'] = $paymentType;
        return $this;
    }
    /**
     * Set Payor
     *
     * @param Payor $payor
     * @return $this
     */
    public function setPayor(\FedExVendor\FedEx\ShipService\ComplexType\Payor $payor)
    {
        $this->values['Payor'] = $payor;
        return $this;
    }
}
