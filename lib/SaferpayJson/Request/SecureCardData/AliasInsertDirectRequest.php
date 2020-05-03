<?php declare(strict_types=1);

namespace Ticketpark\SaferpayJson\Request\SecureCardData;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Ticketpark\SaferpayJson\Container\Check;
use Ticketpark\SaferpayJson\Container\PaymentMeans;
use Ticketpark\SaferpayJson\Container\RegisterAlias;
use Ticketpark\SaferpayJson\Request\Request;
use Ticketpark\SaferpayJson\Request\RequestCommonsTrait;
use Ticketpark\SaferpayJson\Request\RequestConfig;
use Ticketpark\SaferpayJson\Response\SecureCardData\AliasInsertDirectResponse;

class AliasInsertDirectRequest extends Request
{
    const API_PATH = '/Payment/v1/Alias/InsertDirect';
    const RESPONSE_CLASS = AliasInsertDirectResponse::class;

    use RequestCommonsTrait;

    /**
     * @var RegisterAlias
     * @SerializedName("RegisterAlias")
     */
    protected $registerAlias;

    /**
     * @var PaymentMeans
     * @SerializedName("PaymentMeans")
     * @Type("Ticketpark\SaferpayJson\Container\PaymentMeans")
     */
    protected $paymentMeans;

    /**
     * @var Check
     * @SerializedName("Check")
     * @Type("Ticketpark\SaferpayJson\Container\Check")
     */
    protected $check;

    public function __construct(RequestConfig $requestConfig, RegisterAlias $registerAlias, PaymentMeans $paymentMeans)
    {
        $this->registerAlias = $registerAlias;
        $this->paymentMeans = $paymentMeans;

        parent::__construct($requestConfig);
    }

    public function getRegisterAlias(): ?RegisterAlias
    {
        return $this->registerAlias;
    }

    public function setRegisterAlias(RegisterAlias $registerAlias): self
    {
        $this->registerAlias = $registerAlias;

        return $this;
    }

    public function getPaymentMeans(): ?PaymentMeans
    {
        return $this->paymentMeans;
    }

    public function setPaymentMeans(PaymentMeans $paymentMeans): self
    {
        $this->paymentMeans = $paymentMeans;

        return $this;
    }

    public function getCheck(): ?Check
    {
        return $this->check;
    }

    public function setCheck(Check $check): self
    {
        $this->check = $check;

        return $this;
    }
}