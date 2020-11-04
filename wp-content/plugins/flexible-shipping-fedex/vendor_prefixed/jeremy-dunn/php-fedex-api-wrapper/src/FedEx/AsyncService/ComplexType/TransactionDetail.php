<?php

namespace FedExVendor\FedEx\AsyncService\ComplexType;

use FedExVendor\FedEx\AbstractComplexType;
/**
 * TransactionDetail
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  ASync Service
 *
 * @property string $CustomerTransactionId
 * @property Localization $Localization
 */
class TransactionDetail extends \FedExVendor\FedEx\AbstractComplexType
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $name = 'TransactionDetail';
    /**
     * Free form text to be echoed back in the reply. Used to match requests and replies.
     *
     * @param string $customerTransactionId
     * @return $this
     */
    public function setCustomerTransactionId($customerTransactionId)
    {
        $this->values['CustomerTransactionId'] = $customerTransactionId;
        return $this;
    }
    /**
     * Governs data payload language/translations (contrasted with ClientDetail.localization, which governs Notification.localizedMessage language selection).
     *
     * @param Localization $localization
     * @return $this
     */
    public function setLocalization(\FedExVendor\FedEx\AsyncService\ComplexType\Localization $localization)
    {
        $this->values['Localization'] = $localization;
        return $this;
    }
}
