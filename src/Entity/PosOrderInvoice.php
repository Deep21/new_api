<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosOrderInvoice
 *
 * @ORM\Table(name="pos_order_invoice", indexes={@ORM\Index(name="id_order", columns={"id_order"})})
 * @ORM\Entity
 */
class PosOrderInvoice
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_order_invoice", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idOrderInvoice;

    /**
     * @var int
     *
     * @ORM\Column(name="id_order", type="integer", nullable=false)
     */
    private $idOrder;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var int
     *
     * @ORM\Column(name="delivery_number", type="integer", nullable=false)
     */
    private $deliveryNumber;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="delivery_date", type="datetime", nullable=true)
     */
    private $deliveryDate;

    /**
     * @var string
     *
     * @ORM\Column(name="total_discount_tax_excl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalDiscountTaxExcl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_discount_tax_incl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalDiscountTaxIncl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_paid_tax_excl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalPaidTaxExcl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_paid_tax_incl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalPaidTaxIncl = '0.000000';

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
     * @ORM\Column(name="total_shipping_tax_excl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalShippingTaxExcl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_shipping_tax_incl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalShippingTaxIncl = '0.000000';

    /**
     * @var int
     *
     * @ORM\Column(name="shipping_tax_computation_method", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $shippingTaxComputationMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="total_wrapping_tax_excl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalWrappingTaxExcl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_wrapping_tax_incl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalWrappingTaxIncl = '0.000000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="shop_address", type="text", length=65535, nullable=true)
     */
    private $shopAddress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="note", type="text", length=65535, nullable=true)
     */
    private $note;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_add", type="datetime", nullable=false)
     */
    private $dateAdd;

    public function getIdOrderInvoice(): ?int
    {
        return $this->idOrderInvoice;
    }

    public function setIdOrderInvoice(int $idOrderInvoice): self
    {
        $this->idOrderInvoice = $idOrderInvoice;

        return $this;
    }

    public function getIdOrder(): ?int
    {
        return $this->idOrder;
    }

    public function setIdOrder(int $idOrder): self
    {
        $this->idOrder = $idOrder;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

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

    public function getDeliveryDate(): ?\DateTimeInterface
    {
        return $this->deliveryDate;
    }

    public function setDeliveryDate(?\DateTimeInterface $deliveryDate): self
    {
        $this->deliveryDate = $deliveryDate;

        return $this;
    }

    public function getTotalDiscountTaxExcl()
    {
        return $this->totalDiscountTaxExcl;
    }

    public function setTotalDiscountTaxExcl($totalDiscountTaxExcl): self
    {
        $this->totalDiscountTaxExcl = $totalDiscountTaxExcl;

        return $this;
    }

    public function getTotalDiscountTaxIncl()
    {
        return $this->totalDiscountTaxIncl;
    }

    public function setTotalDiscountTaxIncl($totalDiscountTaxIncl): self
    {
        $this->totalDiscountTaxIncl = $totalDiscountTaxIncl;

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

    public function getTotalPaidTaxIncl()
    {
        return $this->totalPaidTaxIncl;
    }

    public function setTotalPaidTaxIncl($totalPaidTaxIncl): self
    {
        $this->totalPaidTaxIncl = $totalPaidTaxIncl;

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

    public function getTotalShippingTaxExcl()
    {
        return $this->totalShippingTaxExcl;
    }

    public function setTotalShippingTaxExcl($totalShippingTaxExcl): self
    {
        $this->totalShippingTaxExcl = $totalShippingTaxExcl;

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

    public function getShippingTaxComputationMethod(): ?int
    {
        return $this->shippingTaxComputationMethod;
    }

    public function setShippingTaxComputationMethod(int $shippingTaxComputationMethod): self
    {
        $this->shippingTaxComputationMethod = $shippingTaxComputationMethod;

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

    public function getTotalWrappingTaxIncl()
    {
        return $this->totalWrappingTaxIncl;
    }

    public function setTotalWrappingTaxIncl($totalWrappingTaxIncl): self
    {
        $this->totalWrappingTaxIncl = $totalWrappingTaxIncl;

        return $this;
    }

    public function getShopAddress(): ?string
    {
        return $this->shopAddress;
    }

    public function setShopAddress(?string $shopAddress): self
    {
        $this->shopAddress = $shopAddress;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

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
