<?php

namespace FedExVendor\FedEx\UploadDocumentService\SimpleType;

use FedExVendor\FedEx\AbstractSimpleType;
/**
 * UploadDocumentType
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Upload Document Service
 */
class UploadDocumentType extends \FedExVendor\FedEx\AbstractSimpleType
{
    const _CERTIFICATE_OF_ORIGIN = 'CERTIFICATE_OF_ORIGIN';
    const _COMMERCIAL_INVOICE = 'COMMERCIAL_INVOICE';
    const _ETD_LABEL = 'ETD_LABEL';
    const _NAFTA_CERTIFICATE_OF_ORIGIN = 'NAFTA_CERTIFICATE_OF_ORIGIN';
    const _OTHER = 'OTHER';
    const _PRO_FORMA_INVOICE = 'PRO_FORMA_INVOICE';
}
