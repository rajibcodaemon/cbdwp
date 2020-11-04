<?php

namespace FedExVendor\FedEx\PickupService\ComplexType;

use FedExVendor\FedEx\AbstractComplexType;
/**
 * These special services are available at the shipment level for some or all service types. If the shipper is requesting a special service which requires additional data (such as the COD amount), the shipment special service type must be present in the specialServiceTypes collection, and the supporting detail must be provided in the appropriate sub-object below.
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Pickup Service
 *
 * @property \FedEx\PickupService\SimpleType\ShipmentSpecialServiceType|string[] $SpecialServiceTypes
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
 * @property FlatbedTrailerDetail $FlatbedTrailerDetail
 * @property FreightGuaranteeDetail $FreightGuaranteeDetail
 * @property EtdDetail $EtdDetail
 * @property ExtraLaborDetail $ExtraLaborDetail
 * @property PalletShrinkwrapDetail $PalletShrinkwrapDetail
 * @property PalletsProvidedDetail $PalletsProvidedDetail
 * @property DetentionDetail $DetentionDetail
 * @property MarkingOrTaggingDetail $MarkingOrTaggingDetail
 * @property NonBusinessTimeDetail $NonBusinessTimeDetail
 * @property ShipmentAssemblyDetail $ShipmentAssemblyDetail
 * @property SortAndSegregateDetail $SortAndSegregateDetail
 * @property SpecialEquipmentDetail $SpecialEquipmentDetail
 * @property StorageDetail $StorageDetail
 * @property WeighingDetail $WeighingDetail
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
     * @param \FedEx\PickupService\SimpleType\ShipmentSpecialServiceType[]|string[] $specialServiceTypes
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
    public function setCodDetail(\FedExVendor\FedEx\PickupService\ComplexType\CodDetail $codDetail)
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
    public function setDeliveryOnInvoiceAcceptanceDetail(\FedExVendor\FedEx\PickupService\ComplexType\DeliveryOnInvoiceAcceptanceDetail $deliveryOnInvoiceAcceptanceDetail)
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
    public function setHoldAtLocationDetail(\FedExVendor\FedEx\PickupService\ComplexType\HoldAtLocationDetail $holdAtLocationDetail)
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
    public function setEventNotificationDetail(\FedExVendor\FedEx\PickupService\ComplexType\ShipmentEventNotificationDetail $eventNotificationDetail)
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
    public function setReturnShipmentDetail(\FedExVendor\FedEx\PickupService\ComplexType\ReturnShipmentDetail $returnShipmentDetail)
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
    public function setPendingShipmentDetail(\FedExVendor\FedEx\PickupService\ComplexType\PendingShipmentDetail $pendingShipmentDetail)
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
    public function setInternationalControlledExportDetail(\FedExVendor\FedEx\PickupService\ComplexType\InternationalControlledExportDetail $internationalControlledExportDetail)
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
    public function setInternationalTrafficInArmsRegulationsDetail(\FedExVendor\FedEx\PickupService\ComplexType\InternationalTrafficInArmsRegulationsDetail $internationalTrafficInArmsRegulationsDetail)
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
    public function setShipmentDryIceDetail(\FedExVendor\FedEx\PickupService\ComplexType\ShipmentDryIceDetail $shipmentDryIceDetail)
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
    public function setHomeDeliveryPremiumDetail(\FedExVendor\FedEx\PickupService\ComplexType\HomeDeliveryPremiumDetail $homeDeliveryPremiumDetail)
    {
        $this->values['HomeDeliveryPremiumDetail'] = $homeDeliveryPremiumDetail;
        return $this;
    }
    /**
     * Set FlatbedTrailerDetail
     *
     * @param FlatbedTrailerDetail $flatbedTrailerDetail
     * @return $this
     */
    public function setFlatbedTrailerDetail(\FedExVendor\FedEx\PickupService\ComplexType\FlatbedTrailerDetail $flatbedTrailerDetail)
    {
        $this->values['FlatbedTrailerDetail'] = $flatbedTrailerDetail;
        return $this;
    }
    /**
     * Set FreightGuaranteeDetail
     *
     * @param FreightGuaranteeDetail $freightGuaranteeDetail
     * @return $this
     */
    public function setFreightGuaranteeDetail(\FedExVendor\FedEx\PickupService\ComplexType\FreightGuaranteeDetail $freightGuaranteeDetail)
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
    public function setEtdDetail(\FedExVendor\FedEx\PickupService\ComplexType\EtdDetail $etdDetail)
    {
        $this->values['EtdDetail'] = $etdDetail;
        return $this;
    }
    /**
     * Specification for labor to be performed with the shipment.
     *
     * @param ExtraLaborDetail $extraLaborDetail
     * @return $this
     */
    public function setExtraLaborDetail(\FedExVendor\FedEx\PickupService\ComplexType\ExtraLaborDetail $extraLaborDetail)
    {
        $this->values['ExtraLaborDetail'] = $extraLaborDetail;
        return $this;
    }
    /**
     * Specifications for pallets to be shrinkwrapped as part of a Freight shipment.
     *
     * @param PalletShrinkwrapDetail $palletShrinkwrapDetail
     * @return $this
     */
    public function setPalletShrinkwrapDetail(\FedExVendor\FedEx\PickupService\ComplexType\PalletShrinkwrapDetail $palletShrinkwrapDetail)
    {
        $this->values['PalletShrinkwrapDetail'] = $palletShrinkwrapDetail;
        return $this;
    }
    /**
     * Specifications for pallets to be provided on Freight shipment.
     *
     * @param PalletsProvidedDetail $palletsProvidedDetail
     * @return $this
     */
    public function setPalletsProvidedDetail(\FedExVendor\FedEx\PickupService\ComplexType\PalletsProvidedDetail $palletsProvidedDetail)
    {
        $this->values['PalletsProvidedDetail'] = $palletsProvidedDetail;
        return $this;
    }
    /**
     * Specifications for pup/set or vehicle delayed for loading or unloading.
     *
     * @param DetentionDetail $detentionDetail
     * @return $this
     */
    public function setDetentionDetail(\FedExVendor\FedEx\PickupService\ComplexType\DetentionDetail $detentionDetail)
    {
        $this->values['DetentionDetail'] = $detentionDetail;
        return $this;
    }
    /**
     * Specification for marking or tagging of pieces in shipment.
     *
     * @param MarkingOrTaggingDetail $markingOrTaggingDetail
     * @return $this
     */
    public function setMarkingOrTaggingDetail(\FedExVendor\FedEx\PickupService\ComplexType\MarkingOrTaggingDetail $markingOrTaggingDetail)
    {
        $this->values['MarkingOrTaggingDetail'] = $markingOrTaggingDetail;
        return $this;
    }
    /**
     * Specification for services performed during non-business hours and/or days.
     *
     * @param NonBusinessTimeDetail $nonBusinessTimeDetail
     * @return $this
     */
    public function setNonBusinessTimeDetail(\FedExVendor\FedEx\PickupService\ComplexType\NonBusinessTimeDetail $nonBusinessTimeDetail)
    {
        $this->values['NonBusinessTimeDetail'] = $nonBusinessTimeDetail;
        return $this;
    }
    /**
     * Specification for assembly performed on shipment.
     *
     * @param ShipmentAssemblyDetail $shipmentAssemblyDetail
     * @return $this
     */
    public function setShipmentAssemblyDetail(\FedExVendor\FedEx\PickupService\ComplexType\ShipmentAssemblyDetail $shipmentAssemblyDetail)
    {
        $this->values['ShipmentAssemblyDetail'] = $shipmentAssemblyDetail;
        return $this;
    }
    /**
     * Specification for sorting and/or segregating performed on shipment.
     *
     * @param SortAndSegregateDetail $sortAndSegregateDetail
     * @return $this
     */
    public function setSortAndSegregateDetail(\FedExVendor\FedEx\PickupService\ComplexType\SortAndSegregateDetail $sortAndSegregateDetail)
    {
        $this->values['SortAndSegregateDetail'] = $sortAndSegregateDetail;
        return $this;
    }
    /**
     * Specification for special equipment used in loading/unloading shipment.
     *
     * @param SpecialEquipmentDetail $specialEquipmentDetail
     * @return $this
     */
    public function setSpecialEquipmentDetail(\FedExVendor\FedEx\PickupService\ComplexType\SpecialEquipmentDetail $specialEquipmentDetail)
    {
        $this->values['SpecialEquipmentDetail'] = $specialEquipmentDetail;
        return $this;
    }
    /**
     * Specification for storage provided for shipment.
     *
     * @param StorageDetail $storageDetail
     * @return $this
     */
    public function setStorageDetail(\FedExVendor\FedEx\PickupService\ComplexType\StorageDetail $storageDetail)
    {
        $this->values['StorageDetail'] = $storageDetail;
        return $this;
    }
    /**
     * Specification for weighing services provided for shipment.
     *
     * @param WeighingDetail $weighingDetail
     * @return $this
     */
    public function setWeighingDetail(\FedExVendor\FedEx\PickupService\ComplexType\WeighingDetail $weighingDetail)
    {
        $this->values['WeighingDetail'] = $weighingDetail;
        return $this;
    }
    /**
     * Specification for date or range of dates on which delivery is to be attempted.
     *
     * @param CustomDeliveryWindowDetail $customDeliveryWindowDetail
     * @return $this
     */
    public function setCustomDeliveryWindowDetail(\FedExVendor\FedEx\PickupService\ComplexType\CustomDeliveryWindowDetail $customDeliveryWindowDetail)
    {
        $this->values['CustomDeliveryWindowDetail'] = $customDeliveryWindowDetail;
        return $this;
    }
}