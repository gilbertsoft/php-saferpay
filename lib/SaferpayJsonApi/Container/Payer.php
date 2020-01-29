<?php

/*
 * This file is part of the gilbertsoft/saferpay-json-api.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Gilbertsoft\SaferpayJsonApi\Container;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class Payer
{
    /**
     * @var string
     * @SerializedName("IpAddress")
     * @Type("string")
     */
    protected $ipAddress;

    /**
     * @var string
     * @SerializedName("LanguageCode")
     * @Type("string")
     */
    protected $languageCode;

    /**
     * @var Gilbertsoft\SaferpayJsonApi\Container\Address
     * @SerializedName("DeliveryAddress")
     * @Type("Gilbertsoft\SaferpayJsonApi\Container\Address")
     */
    protected $deliveryAddress;

    /**
     * @var Gilbertsoft\SaferpayJsonApi\Container\Address
     * @SerializedName("BillingAddress")
     * @Type("Gilbertsoft\SaferpayJsonApi\Container\Address")
     */
    protected $billingAddress;

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     * @return Payer
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * @param string $languageCode
     * @return Payer
     */
    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;

        return $this;
    }

    /**
     * @return Gilbertsoft\SaferpayJsonApi\Container\Address
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * @param Gilbertsoft\SaferpayJsonApi\Container\Address $deliveryAddress
     * @return Payer
     */
    public function setDeliveryAddress(Address $deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    /**
     * @return Gilbertsoft\SaferpayJsonApi\Container\Address
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param Gilbertsoft\SaferpayJsonApi\Container\Address $billingAddress
     * @return Payer
     */
    public function setBillingAddress(Address $billingAddress)
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }
}
