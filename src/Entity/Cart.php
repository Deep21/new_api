<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cart
 *
 * @ORM\Table(name="pos_cart", indexes={@ORM\Index(name="cart_customer", columns={"id_customer"}), @ORM\Index(name="id_address_delivery", columns={"id_address_delivery"}), @ORM\Index(name="id_address_invoice", columns={"id_address_invoice"}), @ORM\Index(name="id_carrier", columns={"id_carrier"}), @ORM\Index(name="id_lang", columns={"id_lang"}), @ORM\Index(name="id_currency", columns={"id_currency"}), @ORM\Index(name="id_guest", columns={"id_guest"}), @ORM\Index(name="id_shop_group", columns={"id_shop_group"}), @ORM\Index(name="id_shop_2", columns={"id_shop", "date_upd"}), @ORM\Index(name="id_shop", columns={"id_shop", "date_add"})})
 * @ORM\Entity
 */
class Cart
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cart", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idCart;

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
     * @var string
     *
     * @ORM\Column(name="delivery_option", type="text", length=65535, nullable=false)
     */
    private $deliveryOption;

    /**
     * @var int
     *
     * @ORM\Column(name="id_lang", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idLang;

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
     * @ORM\Column(name="id_currency", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idCurrency;

    /**
     * @var int
     *
     * @ORM\Column(name="id_customer", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idCustomer;

    /**
     * @var int
     *
     * @ORM\Column(name="id_guest", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idGuest;

    /**
     * @var string
     *
     * @ORM\Column(name="secure_key", type="string", length=32, nullable=false, options={"default"="-1"})
     */
    private $secureKey = '-1';

    /**
     * @var bool
     *
     * @ORM\Column(name="recyclable", type="boolean", nullable=false, options={"default"="1"})
     */
    private $recyclable = '1';

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
     * @var bool
     *
     * @ORM\Column(name="allow_seperated_package", type="boolean", nullable=false)
     */
    private $allowSeperatedPackage = '0';

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

    /**
     * @var string|null
     *
     * @ORM\Column(name="checkout_session_data", type="text", length=16777215, nullable=true)
     */
    private $checkoutSessionData;

    public function getIdCart(): ?int
    {
        return $this->idCart;
    }

    public function setIdCart(int $idCart): self
    {
        $this->idCart = $idCart;

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

    public function getDeliveryOption(): ?string
    {
        return $this->deliveryOption;
    }

    public function setDeliveryOption(string $deliveryOption): self
    {
        $this->deliveryOption = $deliveryOption;

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

    public function getIdCurrency(): ?int
    {
        return $this->idCurrency;
    }

    public function setIdCurrency(int $idCurrency): self
    {
        $this->idCurrency = $idCurrency;

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

    public function getIdGuest(): ?int
    {
        return $this->idGuest;
    }

    public function setIdGuest(int $idGuest): self
    {
        $this->idGuest = $idGuest;

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

    public function getAllowSeperatedPackage(): ?bool
    {
        return $this->allowSeperatedPackage;
    }

    public function setAllowSeperatedPackage(bool $allowSeperatedPackage): self
    {
        $this->allowSeperatedPackage = $allowSeperatedPackage;

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

    public function getCheckoutSessionData(): ?string
    {
        return $this->checkoutSessionData;
    }

    public function setCheckoutSessionData(?string $checkoutSessionData): self
    {
        $this->checkoutSessionData = $checkoutSessionData;

        return $this;
    }


}
