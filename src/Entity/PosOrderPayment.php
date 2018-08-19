<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosOrderPayment
 *
 * @ORM\Table(name="pos_order_payment", indexes={@ORM\Index(name="order_reference", columns={"order_reference"})})
 * @ORM\Entity
 */
class PosOrderPayment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_order_payment", type="integer", nullable=false)
     */
    private $idOrderPayment;

    /**
     * @var string|null
     *
     * @ORM\Column(name="order_reference", type="string", length=9, nullable=true)
     */
    private $orderReference;

    /**
     * @var int
     *
     * @ORM\Column(name="id_currency", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idCurrency;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_method", type="string", length=255, nullable=false)
     */
    private $paymentMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="conversion_rate", type="decimal", precision=13, scale=6, nullable=false, options={"default"="1.000000"})
     */
    private $conversionRate = '1.000000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="transaction_id", type="string", length=254, nullable=true)
     */
    private $transactionId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="card_number", type="string", length=254, nullable=true)
     */
    private $cardNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="card_brand", type="string", length=254, nullable=true)
     */
    private $cardBrand;

    /**
     * @var string|null
     *
     * @ORM\Column(name="card_expiration", type="string", length=7, nullable=true, options={"fixed"=true})
     */
    private $cardExpiration;

    /**
     * @var string|null
     *
     * @ORM\Column(name="card_holder", type="string", length=254, nullable=true)
     */
    private $cardHolder;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_add", type="datetime", nullable=false)
     */
    private $dateAdd;

    public function getIdOrderPayment(): ?int
    {
        return $this->idOrderPayment;
    }

    public function setIdOrderPayment(int $idOrderPayment): self
    {
        $this->idOrderPayment = $idOrderPayment;

        return $this;
    }

    public function getOrderReference(): ?string
    {
        return $this->orderReference;
    }

    public function setOrderReference(?string $orderReference): self
    {
        $this->orderReference = $orderReference;

        return $this;
    }

    public function getIdCurrency(): ?int
    {
        return $this->idCurrency;
    }

    public function setIdCurrency(int $idCurrency): self
    {
        $this->idCurrency = $idCurrency;

        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function getConversionRate()
    {
        return $this->conversionRate;
    }

    public function setConversionRate($conversionRate): self
    {
        $this->conversionRate = $conversionRate;

        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(?string $transactionId): self
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }

    public function setCardNumber(?string $cardNumber): self
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    public function getCardBrand(): ?string
    {
        return $this->cardBrand;
    }

    public function setCardBrand(?string $cardBrand): self
    {
        $this->cardBrand = $cardBrand;

        return $this;
    }

    public function getCardExpiration(): ?string
    {
        return $this->cardExpiration;
    }

    public function setCardExpiration(?string $cardExpiration): self
    {
        $this->cardExpiration = $cardExpiration;

        return $this;
    }

    public function getCardHolder(): ?string
    {
        return $this->cardHolder;
    }

    public function setCardHolder(?string $cardHolder): self
    {
        $this->cardHolder = $cardHolder;

        return $this;
    }

    public function getDateAdd(): ?\DateTimeInterface
    {
        return $this->dateAdd;
    }

    public function setDateAdd(\DateTimeInterface $dateAdd): self
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }


}
