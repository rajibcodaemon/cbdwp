<?php

namespace FedExVendor\FedEx\RateService\SimpleType;

use FedExVendor\FedEx\AbstractSimpleType;
/**
 * NaftaImporterSpecificationType
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Rate Service
 */
class NaftaImporterSpecificationType extends \FedExVendor\FedEx\AbstractSimpleType
{
    const _IMPORTER_OF_RECORD = 'IMPORTER_OF_RECORD';
    const _RECIPIENT = 'RECIPIENT';
    const _UNKNOWN = 'UNKNOWN';
    const _VARIOUS = 'VARIOUS';
}
