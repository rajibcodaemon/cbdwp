<?php

namespace FedExVendor\FedEx\OpenShipService\ComplexType;

use FedExVendor\FedEx\AbstractComplexType;
/**
 * GetCreateOpenShipmentResultsReply
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  OpenShip Service
 *
 * @property \FedEx\OpenShipService\SimpleType\NotificationSeverityType|string $HighestSeverity
 * @property Notification[] $Notifications
 * @property TransactionDetail $TransactionDetail
 * @property VersionId $Version
 * @property \FedEx\OpenShipService\SimpleType\ServiceType|string $ServiceType
 * @property CompletedShipmentDetail $CompletedShipmentDetail
 * @property ShippingDocument[] $ErrorLabels
 * @property string $Index
 */
class GetCreateOpenShipmentResultsReply extends \FedExVendor\FedEx\AbstractComplexType
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $name = 'GetCreateOpenShipmentResultsReply';
    /**
     * Set HighestSeverity
     *
     * @param \FedEx\OpenShipService\SimpleType\NotificationSeverityType|string $highestSeverity
     * @return $this
     */
    public function setHighestSeverity($highestSeverity)
    {
        $this->values['HighestSeverity'] = $highestSeverity;
        return $this;
    }
    /**
     * Set Notifications
     *
     * @param Notification[] $notifications
     * @return $this
     */
    public function setNotifications(array $notifications)
    {
        $this->values['Notifications'] = $notifications;
        return $this;
    }
    /**
     * Set TransactionDetail
     *
     * @param TransactionDetail $transactionDetail
     * @return $this
     */
    public function setTransactionDetail(\FedExVendor\FedEx\OpenShipService\ComplexType\TransactionDetail $transactionDetail)
    {
        $this->values['TransactionDetail'] = $transactionDetail;
        return $this;
    }
    /**
     * Set Version
     *
     * @param VersionId $version
     * @return $this
     */
    public function setVersion(\FedExVendor\FedEx\OpenShipService\ComplexType\VersionId $version)
    {
        $this->values['Version'] = $version;
        return $this;
    }
    /**
     * Set ServiceType
     *
     * @param \FedEx\OpenShipService\SimpleType\ServiceType|string $serviceType
     * @return $this
     */
    public function setServiceType($serviceType)
    {
        $this->values['ServiceType'] = $serviceType;
        return $this;
    }
    /**
     * Set CompletedShipmentDetail
     *
     * @param CompletedShipmentDetail $completedShipmentDetail
     * @return $this
     */
    public function setCompletedShipmentDetail(\FedExVendor\FedEx\OpenShipService\ComplexType\CompletedShipmentDetail $completedShipmentDetail)
    {
        $this->values['CompletedShipmentDetail'] = $completedShipmentDetail;
        return $this;
    }
    /**
     * Set ErrorLabels
     *
     * @param ShippingDocument[] $errorLabels
     * @return $this
     */
    public function setErrorLabels(array $errorLabels)
    {
        $this->values['ErrorLabels'] = $errorLabels;
        return $this;
    }
    /**
     * Set Index
     *
     * @param string $index
     * @return $this
     */
    public function setIndex($index)
    {
        $this->values['Index'] = $index;
        return $this;
    }
}
