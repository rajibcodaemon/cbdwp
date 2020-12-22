<?php

namespace FedExVendor\FedEx\ShipService\ComplexType;

use FedExVendor\FedEx\AbstractComplexType;
/**
 * These special services are available at the shipment level for some or all service types. If the shipper is requesting a special service which requires additional data (such as the COD amount), the shipment special service type must be present in the specialServiceTypes collection, and the supporting detail must be provided in the appropriate sub-object below.
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Ship Service
 *
 * @property \FedEx\ShipService\SimpleType\ShipmentSpecialServiceType|string[] $SpecialServiceTypes
 * @property CodDetail $CodDetail
 * @property DeliveryOnInvoiceAcceptanceDetail $DeliveryOnInvoiceAcceptanceDetail
 * @property HoldAtLocationDetail $HoldAtLocationDetail
 * @property ShipmentEventNotificationDetail $EventNotificationDetail
 * @property ReturnShipmentDetail $ReturnShipmentDetail
 * @property PendingShipmentDetail $PendingShipmentDetail
 * @property InternationalControlledExportDetail $InternationalControlledExportDetail
 * @property InternationalTrafficInArmsRegulationsDetail $InternationalTrafficInArmsRegulationsDetail
 * @property ShipmentDryIceDetail $ShipmentDryIceDetail
 * @property HomeDeliveryPremiumDetail $HomeDeliveryPremiumDetail
 * @property FreightGuaranteeDetail $FreightGuaranteeDetail
 * @property EtdDetail $EtdDetail
 * @property CustomDeliveryWindowDetail $CustomDeliveryWindowDetail
 */
class ShipmentSpecialServicesRequested extends \FedExVendor\FedEx\AbstractComplexType
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $name = 'ShipmentSpecialServicesRequested';
    /**
     * The types of all special services requested for the enclosing shipment (or other shipment-level transaction).
     *
     * @param \FedEx\ShipService\SimpleType\ShipmentSpecialServiceType[]|string[] $specialServiceTypes
     * @return $this
     */
    public function setSpecialServiceTypes(array $specialServiceTypes)
    {
        $this->values['SpecialServiceTypes'] = $specialServiceTypes;
        return $this;
    }
    /**
     * Set CodDetail
     *
     * @param CodDetail $codDetail
     * @return $this
     */
    public function setCodDetail(\FedExVendor\FedEx\ShipService\ComplexType\CodDetail $codDetail)
    {
        $this->values['CodDetail'] = $codDetail;
        return $this;
    }
    /**
     * Set DeliveryOnInvoiceAcceptanceDetail
     *
     * @param DeliveryOnInvoiceAcceptanceDetail $deliveryOnInvoiceAcceptanceDetail
     * @return $this
     */
    public function setDeliveryOnInvoiceAcceptanceDetail(\FedExVendor\FedEx\ShipService\ComplexType\DeliveryOnInvoiceAcceptanceDetail $deliveryOnInvoiceAcceptanceDetail)
    {
        $this->values['DeliveryOnInvoiceAcceptanceDetail'] = $deliveryOnInvoiceAcceptanceDetail;
        return $this;
    }
    /**
     * Set HoldAtLocationDetail
     *
     * @param HoldAtLocationDetail $holdAtLocationDetail
     * @return $this
     */
    public function setHoldAtLocationDetail(\FedExVendor\FedEx\ShipService\ComplexType\HoldAtLocationDetail $holdAtLocationDetail)
    {
        $this->values['HoldAtLocationDetail'] = $holdAtLocationDetail;
        return $this;
    }
    /**
     * This replaces eMailNotificationDetail
     *
     * @param ShipmentEventNotificationDetail $eventNotificationDetail
     * @return $this
     */
    public function setEventNotificationDetail(\FedExVendor\FedEx\ShipService\ComplexType\ShipmentEventNotificationDetail $eventNotificationDetail)
    {
        $this->values['EventNotificationDetail'] = $eventNotificationDetail;
        return $this;
    }
    /**
     * Set ReturnShipmentDetail
     *
     * @param ReturnShipmentDetail $returnShipmentDetail
     * @return $this
     */
    public function setReturnShipmentDetail(\FedExVendor\FedEx\ShipService\ComplexType\ReturnShipmentDetail $returnShipmentDetail)
    {
        $this->values['ReturnShipmentDetail'] = $returnShipmentDetail;
        return $this;
    }
    /**
     * This field should be populated for pending shipments (e.g. e-mail label) It is required by a PENDING_SHIPMENT special service type.
     *
     * @param PendingShipmentDetail $pendingShipmentDetail
     * @return $this
     */
    public function setPendingShipmentDetail(\FedExVendor\FedEx\ShipService\ComplexType\PendingShipmentDetail $pendingShipmentDetail)
    {
        $this->values['PendingShipmentDetail'] = $pendingShipmentDetail;
        return $this;
    }
    /**
     * Set InternationalControlledExportDetail
     *
     * @param InternationalControlledExportDetail $internationalControlledExportDetail
     * @return $this
     */
    public function setInternationalControlledExportDetail(\FedExVendor\FedEx\ShipService\ComplexType\InternationalControlledExportDetail $internationalControlledExportDetail)
    {
        $this->values['InternationalControlledExportDetail'] = $internationalControlledExportDetail;
        return $this;
    }
    /**
     * Set InternationalTrafficInArmsRegulationsDetail
     *
     * @param InternationalTrafficInArmsRegulationsDetail $internationalTrafficInArmsRegulationsDetail
     * @return $this
     */
    public function setInternationalTrafficInArmsRegulationsDetail(\FedExVendor\FedEx\ShipService\ComplexType\InternationalTrafficInArmsRegulationsDetail $internationalTrafficInArmsRegulationsDetail)
    {
        $this->values['InternationalTrafficInArmsRegulationsDetail'] = $internationalTrafficInArmsRegulationsDetail;
        return $this;
    }
    /**
     * Set ShipmentDryIceDetail
     *
     * @param ShipmentDryIceDetail $shipmentDryIceDetail
     * @return $this
     */
    public function setShipmentDryIceDetail(\FedExVendor\FedEx\ShipService\ComplexType\ShipmentDryIceDetail $shipmentDryIceDetail)
    {
        $this->values['ShipmentDryIceDetail'] = $shipmentDryIceDetail;
        return $this;
    }
    /**
     * Set HomeDeliveryPremiumDetail
     *
     * @param HomeDeliveryPremiumDetail $homeDeliveryPremiumDetail
     * @return $this
     */
    public function setHomeDeliveryPremiumDetail(\FedExVendor\FedEx\ShipService\ComplexType\HomeDeliveryPremiumDetail $homeDeliveryPremiumDetail)
    {
        $this->values['HomeDeliveryPremiumDetail'] = $homeDeliveryPremiumDetail;
        return $this;
    }
    /**
     * Set FreightGuaranteeDetail
     *
     * @param FreightGuaranteeDetail $freightGuaranteeDetail
     * @return $this
     */
    public function setFreightGuaranteeDetail(\FedExVendor\FedEx\ShipService\ComplexType\FreightGuaranteeDetail $freightGuaranteeDetail)
    {
        $this->values['FreightGuaranteeDetail'] = $freightGuaranteeDetail;
        return $this;
    }
    /**
     * Electronic Trade document references.
     *
     * @param EtdDetail $etdDetail
     * @return $this
     */
    public function setEtdDetail(\FedExVendor\FedEx\ShipService\ComplexType\EtdDetail $etdDetail)
    {
        $this->values['EtdDetail'] = $etdDetail;
        return $this;
    }
    /**
     * Specification for date or range of dates on which delivery is to be attempted.
     *
     * @param CustomDeliveryWindowDetail $customDeliveryWindowDetail
     * @return $this
     */
    public function setCustomDeliveryWindowDetail(\FedExVendor\FedEx\ShipService\ComplexType\CustomDeliveryWindowDetail $customDeliveryWindowDetail)
    {
        $this->values['CustomDeliveryWindowDetail'] = $customDeliveryWindowDetail;
        return $this;
    }
}
