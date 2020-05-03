<?php declare(strict_types=1);
namespace Ticketpark\SaferpayJson\Request\Transaction;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Ticketpark\SaferpayJson\Container\Payer;
use Ticketpark\SaferpayJson\Container\RegisterAlias;
use Ticketpark\SaferpayJson\Request\Request;
use Ticketpark\SaferpayJson\Container\Payment;
use Ticketpark\SaferpayJson\Container\PaymentMeans;
use Ticketpark\SaferpayJson\Request\RequestCommonsTrait;
use Ticketpark\SaferpayJson\Request\RequestConfig;
use Ticketpark\SaferpayJson\Response\Transaction\AuthorizeDirectResponse;

/**
 * Class AuthorizeDirectRequest
 * @package Ticketpark\SaferpayJson\Transaction
 */
class AuthorizeDirectRequest extends Request
{
    const API_PATH = '/Payment/v1/Transaction/AuthorizeDirect';
    const RESPONSE_CLASS = AuthorizeDirectResponse::class;

    use RequestCommonsTrait;

    /**
     * @var Payment
     * @SerializedName("Payment")
     */
    protected $payment;

    /**
     * @var PaymentMeans
     * @SerializedName("PaymentMeans")
     */
    protected $paymentMeans;

    /**
     * @var RegisterAlias
     * @SerializedName("RegisterAlias")
     */
    protected $registerAlias;

    /**
     * @var Payer
     * @SerializedName("Payer")
     */
    protected $payer;

    /**
     * @var string
     * @SerializedName("TerminalId")
     */
    protected $terminalId;

    public function __construct(
        RequestConfig $requestConfig,
        string $terminalId,
        Payment $payment,
        PaymentMeans $paymentMeans
    ) {
        $this->terminalId = $terminalId;
        $this->payment = $payment;
        $this->paymentMeans = $paymentMeans;

        parent::__construct($requestConfig);
    }

    public function getPayment(): Payment
    {
        return $this->payment;
    }

    public function setPayment(Payment $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getPaymentMeans(): PaymentMeans
    {
        return $this->paymentMeans;
    }

    public function setPaymentMeans(PaymentMeans $paymentMeans): self
    {
        $this->paymentMeans = $paymentMeans;

        return $this;
    }

    public function getTerminalId(): string
    {
        return $this->terminalId;
    }

    public function setTerminalId(string $terminalId): self
    {
        $this->terminalId = $terminalId;

        return $this;
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

    public function getPayer(): ?Payer
    {
        return $this->payer;
    }

    public function setPayer(Payer $payer): self
    {
        $this->payer = $payer;

        return $this;
    }
}
