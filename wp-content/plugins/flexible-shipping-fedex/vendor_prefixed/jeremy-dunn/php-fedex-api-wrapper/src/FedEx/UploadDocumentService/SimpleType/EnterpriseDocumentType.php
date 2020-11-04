<?php

namespace FedExVendor\FedEx\UploadDocumentService\SimpleType;

use FedExVendor\FedEx\AbstractSimpleType;
/**
 * This identifies some of the document types recognized by Enterprise Document Management Service.
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Upload Document Service
 */
class EnterpriseDocumentType extends \FedExVendor\FedEx\AbstractSimpleType
{
    const _AIR_WAYBILL = 'AIR_WAYBILL';
    const _CERTIFICATE_OF_ORIGIN = 'CERTIFICATE_OF_ORIGIN';
    const _COMMERCIAL_INVOICE = 'COMMERCIAL_INVOICE';
    const _NAFTA_CERTIFICATE_OF_ORIGIN = 'NAFTA_CERTIFICATE_OF_ORIGIN';
    const _PRO_FORMA_INVOICE = 'PRO_FORMA_INVOICE';
}
