<?php

namespace FedExVendor\FedEx\PackageMovementInformationService\ComplexType;

use FedExVendor\FedEx\AbstractComplexType;
/**
 * Used in authentication of the sender's identity.
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Package Movement Information Service
 *
 * @property WebAuthenticationCredential $UserCredential
 */
class WebAuthenticationDetail extends \FedExVendor\FedEx\AbstractComplexType
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $name = 'WebAuthenticationDetail';
    /**
     * Credential used to authenticate a specific software application. This value is provided by FedEx after registration.
     *
     * @param WebAuthenticationCredential $userCredential
     * @return $this
     */
    public function setUserCredential(\FedExVendor\FedEx\PackageMovementInformationService\ComplexType\WebAuthenticationCredential $userCredential)
    {
        $this->values['UserCredential'] = $userCredential;
        return $this;
    }
}