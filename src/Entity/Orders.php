<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="pos_orders", indexes={@ORM\Index(name="reference", columns={"reference"}), @ORM\Index(name="id_customer", columns={"id_customer"}), @ORM\Index(name="id_cart", columns={"id_cart"}), @ORM\Index(name="invoice_number", columns={"invoice_number"}), @ORM\Index(name="id_carrier", columns={"id_carrier"}), @ORM\Index(name="id_lang", columns={"id_lang"}), @ORM\Index(name="id_currency", columns={"id_currency"}), @ORM\Index(name="id_address_delivery", columns={"id_address_delivery"}), @ORM\Index(name="id_address_invoice", columns={"id_address_invoice"}), @ORM\Index(name="id_shop_group", columns={"id_shop_group"}), @ORM\Index(name="current_state", columns={"current_state"}), @ORM\Index(name="id_shop", columns={"id_shop"}), @ORM\Index(name="date_add", columns={"date_add"})})
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_order", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idOrder;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference", type="string", length=9, nullable=true)
     */
    private $reference;

    /**
     * @var int
     *
     * @ORM\Column(name="id_shop_group", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $idShopGroup = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="id_shop", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $idShop = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="id_carrier", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idCarrier;

    /**
     * @var int
     *
     * @ORM\Column(name="id_lang", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idLang;

    /**
     * @var int
     *
     * @ORM\Column(name="id_customer", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idCustomer;

    /**
     * @var int
     *
     * @ORM\Column(name="id_cart", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idCart;

    /**
     * @var int
     *
     * @ORM\Column(name="id_currency", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idCurrency;

    /**
     * @var int
     *
     * @ORM\Column(name="id_address_delivery", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idAddressDelivery;

    /**
     * @var int
     *
     * @ORM\Column(name="id_address_invoice", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idAddressInvoice;

    /**
     * @var int
     *
     * @ORM\Column(name="current_state", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $currentState;

    /**
     * @var string
     *
     * @ORM\Column(name="secure_key", type="string", length=32, nullable=false, options={"default"="-1"})
     */
    private $secureKey = '-1';

    /**
     * @var string
     *
     * @ORM\Column(name="payment", type="string", length=255, nullable=false)
     */
    private $payment;

    /**
     * @var string
     *
     * @ORM\Column(name="conversion_rate", type="decimal", precision=13, scale=6, nullable=false, options={"default"="1.000000"})
     */
    private $conversionRate = '1.000000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="module", type="string", length=255, nullable=true)
     */
    private $module;

    /**
     * @var bool
     *
     * @ORM\Column(name="recyclable", type="boolean", nullable=false)
     */
    private $recyclable = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="gift", type="boolean", nullable=false)
     */
    private $gift = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="gift_message", type="text", length=65535, nullable=true)
     */
    private $giftMessage;

    /**
     * @var bool
     *
     * @ORM\Column(name="mobile_theme", type="boolean", nullable=false)
     */
    private $mobileTheme = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="shipping_number", type="string", length=64, nullable=true)
     */
    private $shippingNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="total_discounts", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalDiscounts = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_discounts_tax_incl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalDiscountsTaxIncl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_discounts_tax_excl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalDiscountsTaxExcl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_paid", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalPaid = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_paid_tax_incl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalPaidTaxIncl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_paid_tax_excl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalPaidTaxExcl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_paid_real", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalPaidReal = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_products", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalProducts = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_products_wt", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalProductsWt = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_shipping", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalShipping = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_shipping_tax_incl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalShippingTaxIncl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_shipping_tax_excl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalShippingTaxExcl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="carrier_tax_rate", type="decimal", precision=10, scale=3, nullable=false, options={"default"="0.000"})
     */
    private $carrierTaxRate = '0.000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_wrapping", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalWrapping = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_wrapping_tax_incl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalWrappingTaxIncl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_wrapping_tax_excl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalWrappingTaxExcl = '0.000000';

    /**
     * @var bool
     *
     * @ORM\Column(name="round_mode", type="boolean", nullable=false, options={"default"="2"})
     */
    private $roundMode = '2';

    /**
     * @var bool
     *
     * @ORM\Column(name="round_type", type="boolean", nullable=false, options={"default"="1"})
     */
    private $roundType = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="invoice_number", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $invoiceNumber = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="delivery_number", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $deliveryNumber = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="invoice_date", type="datetime", nullable=false)
     */
    private $invoiceDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="delivery_date", type="datetime", nullable=false)
     */
    private $deliveryDate;

    /**
     * @var int
     *
     * @ORM\Column(name="valid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $valid = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_add", type="datetime", nullable=false)
     */
    private $dateAdd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_upd", type="datetime", nullable=false)
     */
    private $dateUpd;

    public function getIdOrder(): ?int
    {
        return $this->idOrder;
    }

    public function setIdOrder(int $idOrder): self
    {
        $this->idOrder = $idOrder;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getIdShopGroup(): ?int
    {
        return $this->idShopGroup;
    }

    public function setIdShopGroup(int $idShopGroup): self
    {
        $this->idShopGroup = $idShopGroup;

        return $this;
    }

    public function getIdShop(): ?int
    {
        return $this->idShop;
    }

    public function setIdShop(int $idShop): self
    {
        $this->idShop = $idShop;

        return $this;
    }

    public function getIdCarrier(): ?int
    {
        return $this->idCarrier;
    }

    public function setIdCarrier(int $idCarrier): self
    {
        $this->idCarrier = $idCarrier;

        return $this;
    }

    public function getIdLang(): ?int
    {
        return $this->idLang;
    }

    public function setIdLang(int $idLang): self
    {
        $this->idLang = $idLang;

        return $this;
    }

    public function getIdCustomer(): ?int
    {
        return $this->idCustomer;
    }

    public function setIdCustomer(int $idCustomer): self
    {
        $this->idCustomer = $idCustomer;

        return $this;
    }

    public function getIdCart(): ?int
    {
        return $this->idCart;
    }

    public function setIdCart(int $idCart): self
    {
        $this->idCart = $idCart;

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

    public function getIdAddressDelivery(): ?int
    {
        return $this->idAddressDelivery;
    }

    public function setIdAddressDelivery(int $idAddressDelivery): self
    {
        $this->idAddressDelivery = $idAddressDelivery;

        return $this;
    }

    public function getIdAddressInvoice(): ?int
    {
        return $this->idAddressInvoice;
    }

    public function setIdAddressInvoice(int $idAddressInvoice): self
    {
        $this->idAddressInvoice = $idAddressInvoice;

        return $this;
    }

    public function getCurrentState(): ?int
    {
        return $this->currentState;
    }

    public function setCurrentState(int $currentState): self
    {
        $this->currentState = $currentState;

        return $this;
    }

    public function getSecureKey(): ?string
    {
        return $this->secureKey;
    }

    public function setSecureKey(string $secureKey): self
    {
        $this->secureKey = $secureKey;

        return $this;
    }

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(string $payment): self
    {
        $this->payment = $payment;

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

    public function getModule(): ?string
    {
        return $this->module;
    }

    public function setModule(?string $module): self
    {
        $this->module = $module;

        return $this;
    }

    public function getRecyclable(): ?bool
    {
        return $this->recyclable;
    }

    public function setRecyclable(bool $recyclable): self
    {
        $this->recyclable = $recyclable;

        return $this;
    }

    public function getGift(): ?bool
    {
        return $this->gift;
    }

    public function setGift(bool $gift): self
    {
        $this->gift = $gift;

        return $this;
    }

    public function getGiftMessage(): ?string
    {
        return $this->giftMessage;
    }

    public function setGiftMessage(?string $giftMessage): self
    {
        $this->giftMessage = $giftMessage;

        return $this;
    }

    public function getMobileTheme(): ?bool
    {
        return $this->mobileTheme;
    }

    public function setMobileTheme(bool $mobileTheme): self
    {
        $this->mobileTheme = $mobileTheme;

        return $this;
    }

    public function getShippingNumber(): ?string
    {
        return $this->shippingNumber;
    }

    public function setShippingNumber(?string $shippingNumber): self
    {
        $this->shippingNumber = $shippingNumber;

        return $this;
    }

    public function getTotalDiscounts()
    {
        return $this->totalDiscounts;
    }

    public function setTotalDiscounts($totalDiscounts): self
    {
        $this->totalDiscounts = $totalDiscounts;

        return $this;
    }

    public function getTotalDiscountsTaxIncl()
    {
        return $this->totalDiscountsTaxIncl;
    }

    public function setTotalDiscountsTaxIncl($totalDiscountsTaxIncl): self
    {
        $this->totalDiscountsTaxIncl = $totalDiscountsTaxIncl;

        return $this;
    }

    public function getTotalDiscountsTaxExcl()
    {
        return $this->totalDiscountsTaxExcl;
    }

    public function setTotalDiscountsTaxExcl($totalDiscountsTaxExcl): self
    {
        $this->totalDiscountsTaxExcl = $totalDiscountsTaxExcl;

        return $this;
    }

    public function getTotalPaid()
    {
        return $this->totalPaid;
    }

    public function setTotalPaid($totalPaid): self
    {
        $this->totalPaid = $totalPaid;

        return $this;
    }

    public function getTotalPaidTaxIncl()
    {
        return $this->totalPaidTaxIncl;
    }

    public function setTotalPaidTaxIncl($totalPaidTaxIncl): self
    {
        $this->totalPaidTaxIncl = $totalPaidTaxIncl;

        return $this;
    }

    public function getTotalPaidTaxExcl()
    {
        return $this->totalPaidTaxExcl;
    }

    public function setTotalPaidTaxExcl($totalPaidTaxExcl): self
    {
        $this->totalPaidTaxExcl = $totalPaidTaxExcl;

        return $this;
    }

    public function getTotalPaidReal()
    {
        return $this->totalPaidReal;
    }

    public function setTotalPaidReal($totalPaidReal): self
    {
        $this->totalPaidReal = $totalPaidReal;

        return $this;
    }

    public function getTotalProducts()
    {
        return $this->totalProducts;
    }

    public function setTotalProducts($totalProducts): self
    {
        $this->totalProducts = $totalProducts;

        return $this;
    }

    public function getTotalProductsWt()
    {
        return $this->totalProductsWt;
    }

    public function setTotalProductsWt($totalProductsWt): self
    {
        $this->totalProductsWt = $totalProductsWt;

        return $this;
    }

    public function getTotalShipping()
    {
        return $this->totalShipping;
    }

    public function setTotalShipping($totalShipping): self
    {
        $this->totalShipping = $totalShipping;

        return $this;
    }

    public function getTotalShippingTaxIncl()
    {
        return $this->totalShippingTaxIncl;
    }

    public function setTotalShippingTaxIncl($totalShippingTaxIncl): self
    {
        $this->totalShippingTaxIncl = $totalShippingTaxIncl;

        return $this;
    }

    public function getTotalShippingTaxExcl()
    {
        return $this->totalShippingTaxExcl;
    }

    public function setTotalShippingTaxExcl($totalShippingTaxExcl): self
    {
        $this->totalShippingTaxExcl = $totalShippingTaxExcl;

        return $this;
    }

    public function getCarrierTaxRate()
    {
        return $this->carrierTaxRate;
    }

    public function setCarrierTaxRate($carrierTaxRate): self
    {
        $this->carrierTaxRate = $carrierTaxRate;

        return $this;
    }

    public function getTotalWrapping()
    {
        return $this->totalWrapping;
    }

    public function setTotalWrapping($totalWrapping): self
    {
        $this->totalWrapping = $totalWrapping;

        return $this;
    }

    public function getTotalWrappingTaxIncl()
    {
        return $this->totalWrappingTaxIncl;
    }

    public function setTotalWrappingTaxIncl($totalWrappingTaxIncl): self
    {
        $this->totalWrappingTaxIncl = $totalWrappingTaxIncl;

        return $this;
    }

    public function getTotalWrappingTaxExcl()
    {
        return $this->totalWrappingTaxExcl;
    }

    public function setTotalWrappingTaxExcl($totalWrappingTaxExcl): self
    {
        $this->totalWrappingTaxExcl = $totalWrappingTaxExcl;

        return $this;
    }

    public function getRoundMode(): ?bool
    {
        return $this->roundMode;
    }

    public function setRoundMode(bool $roundMode): self
    {
        $this->roundMode = $roundMode;

        return $this;
    }

    public function getRoundType(): ?bool
    {
        return $this->roundType;
    }

    public function setRoundType(bool $roundType): self
    {
        $this->roundType = $roundType;

        return $this;
    }

    public function getInvoiceNumber(): ?int
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(int $invoiceNumber): self
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    public function getDeliveryNumber(): ?int
    {
        return $this->deliveryNumber;
    }

    public function setDeliveryNumber(int $deliveryNumber): self
    {
        $this->deliveryNumber = $deliveryNumber;

        return $this;
    }

    public function getInvoiceDate(): ?\DateTimeInterface
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate(\DateTimeInterface $invoiceDate): self
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    public function getDeliveryDate(): ?\DateTimeInterface
    {
        return $this->deliveryDate;
    }

    public function setDeliveryDate(\DateTimeInterface $deliveryDate): self
    {
        $this->deliveryDate = $deliveryDate;

        return $this;
    }

    public function getValid(): ?int
    {
        return $this->valid;
    }

    public function setValid(int $valid): self
    {
        $this->valid = $valid;

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

    public function getDateUpd(): ?\DateTimeInterface
    {
        return $this->dateUpd;
    }

    public function setDateUpd(\DateTimeInterface $dateUpd): self
    {
        $this->dateUpd = $dateUpd;

        return $this;
    }


}
