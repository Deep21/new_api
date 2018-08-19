<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderDetail
 *
 * @ORM\Table(name="pos_order_detail", indexes={@ORM\Index(name="order_detail_order", columns={"id_order"}), @ORM\Index(name="product_id", columns={"product_id", "product_attribute_id"}), @ORM\Index(name="product_attribute_id", columns={"product_attribute_id"}), @ORM\Index(name="id_tax_rules_group", columns={"id_tax_rules_group"}), @ORM\Index(name="id_order_id_order_detail", columns={"id_order", "id_order_detail"})})
 * @ORM\Entity
 */
class OrderDetail
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_order_detail", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idOrderDetail;

    /**
     * @var int
     *
     * @ORM\Column(name="id_order", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idOrder;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_order_invoice", type="integer", nullable=true)
     */
    private $idOrderInvoice;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_warehouse", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $idWarehouse = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="id_shop", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idShop;

    /**
     * @var int
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $productId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="product_attribute_id", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $productAttributeId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_customization", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $idCustomization = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=255, nullable=false)
     */
    private $productName;

    /**
     * @var int
     *
     * @ORM\Column(name="product_quantity", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $productQuantity = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="product_quantity_in_stock", type="integer", nullable=false)
     */
    private $productQuantityInStock = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="product_quantity_refunded", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $productQuantityRefunded = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="product_quantity_return", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $productQuantityReturn = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="product_quantity_reinjected", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $productQuantityReinjected = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="product_price", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $productPrice = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="reduction_percent", type="decimal", precision=10, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $reductionPercent = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="reduction_amount", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $reductionAmount = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="reduction_amount_tax_incl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $reductionAmountTaxIncl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="reduction_amount_tax_excl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $reductionAmountTaxExcl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="group_reduction", type="decimal", precision=10, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $groupReduction = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="product_quantity_discount", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $productQuantityDiscount = '0.000000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="product_ean13", type="string", length=13, nullable=true)
     */
    private $productEan13;

    /**
     * @var string|null
     *
     * @ORM\Column(name="product_isbn", type="string", length=32, nullable=true)
     */
    private $productIsbn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="product_upc", type="string", length=12, nullable=true)
     */
    private $productUpc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="product_reference", type="string", length=32, nullable=true)
     */
    private $productReference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="product_supplier_reference", type="string", length=32, nullable=true)
     */
    private $productSupplierReference;

    /**
     * @var string
     *
     * @ORM\Column(name="product_weight", type="decimal", precision=20, scale=6, nullable=false)
     */
    private $productWeight;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_tax_rules_group", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $idTaxRulesGroup = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="tax_computation_method", type="boolean", nullable=false)
     */
    private $taxComputationMethod = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="tax_name", type="string", length=16, nullable=false)
     */
    private $taxName;

    /**
     * @var string
     *
     * @ORM\Column(name="tax_rate", type="decimal", precision=10, scale=3, nullable=false, options={"default"="0.000"})
     */
    private $taxRate = '0.000';

    /**
     * @var string
     *
     * @ORM\Column(name="ecotax", type="decimal", precision=21, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $ecotax = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="ecotax_tax_rate", type="decimal", precision=5, scale=3, nullable=false, options={"default"="0.000"})
     */
    private $ecotaxTaxRate = '0.000';

    /**
     * @var bool
     *
     * @ORM\Column(name="discount_quantity_applied", type="boolean", nullable=false)
     */
    private $discountQuantityApplied = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="download_hash", type="string", length=255, nullable=true)
     */
    private $downloadHash;

    /**
     * @var int|null
     *
     * @ORM\Column(name="download_nb", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $downloadNb = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="download_deadline", type="datetime", nullable=true)
     */
    private $downloadDeadline;

    /**
     * @var string
     *
     * @ORM\Column(name="total_price_tax_incl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalPriceTaxIncl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_price_tax_excl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalPriceTaxExcl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="unit_price_tax_incl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $unitPriceTaxIncl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="unit_price_tax_excl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $unitPriceTaxExcl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_shipping_price_tax_incl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalShippingPriceTaxIncl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="total_shipping_price_tax_excl", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $totalShippingPriceTaxExcl = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="purchase_supplier_price", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $purchaseSupplierPrice = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="original_product_price", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $originalProductPrice = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="original_wholesale_price", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $originalWholesalePrice = '0.000000';

    public function getIdOrderDetail(): ?int
    {
        return $this->idOrderDetail;
    }

    public function setIdOrderDetail(int $idOrderDetail): self
    {
        $this->idOrderDetail = $idOrderDetail;

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

    public function getIdOrderInvoice(): ?int
    {
        return $this->idOrderInvoice;
    }

    public function setIdOrderInvoice(?int $idOrderInvoice): self
    {
        $this->idOrderInvoice = $idOrderInvoice;

        return $this;
    }

    public function getIdWarehouse(): ?int
    {
        return $this->idWarehouse;
    }

    public function setIdWarehouse(?int $idWarehouse): self
    {
        $this->idWarehouse = $idWarehouse;

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

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): self
    {
        $this->productId = $productId;

        return $this;
    }

    public function getProductAttributeId(): ?int
    {
        return $this->productAttributeId;
    }

    public function setProductAttributeId(?int $productAttributeId): self
    {
        $this->productAttributeId = $productAttributeId;

        return $this;
    }

    public function getIdCustomization(): ?int
    {
        return $this->idCustomization;
    }

    public function setIdCustomization(?int $idCustomization): self
    {
        $this->idCustomization = $idCustomization;

        return $this;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getProductQuantity(): ?int
    {
        return $this->productQuantity;
    }

    public function setProductQuantity(int $productQuantity): self
    {
        $this->productQuantity = $productQuantity;

        return $this;
    }

    public function getProductQuantityInStock(): ?int
    {
        return $this->productQuantityInStock;
    }

    public function setProductQuantityInStock(int $productQuantityInStock): self
    {
        $this->productQuantityInStock = $productQuantityInStock;

        return $this;
    }

    public function getProductQuantityRefunded(): ?int
    {
        return $this->productQuantityRefunded;
    }

    public function setProductQuantityRefunded(int $productQuantityRefunded): self
    {
        $this->productQuantityRefunded = $productQuantityRefunded;

        return $this;
    }

    public function getProductQuantityReturn(): ?int
    {
        return $this->productQuantityReturn;
    }

    public function setProductQuantityReturn(int $productQuantityReturn): self
    {
        $this->productQuantityReturn = $productQuantityReturn;

        return $this;
    }

    public function getProductQuantityReinjected(): ?int
    {
        return $this->productQuantityReinjected;
    }

    public function setProductQuantityReinjected(int $productQuantityReinjected): self
    {
        $this->productQuantityReinjected = $productQuantityReinjected;

        return $this;
    }

    public function getProductPrice()
    {
        return $this->productPrice;
    }

    public function setProductPrice($productPrice): self
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    public function getReductionPercent()
    {
        return $this->reductionPercent;
    }

    public function setReductionPercent($reductionPercent): self
    {
        $this->reductionPercent = $reductionPercent;

        return $this;
    }

    public function getReductionAmount()
    {
        return $this->reductionAmount;
    }

    public function setReductionAmount($reductionAmount): self
    {
        $this->reductionAmount = $reductionAmount;

        return $this;
    }

    public function getReductionAmountTaxIncl()
    {
        return $this->reductionAmountTaxIncl;
    }

    public function setReductionAmountTaxIncl($reductionAmountTaxIncl): self
    {
        $this->reductionAmountTaxIncl = $reductionAmountTaxIncl;

        return $this;
    }

    public function getReductionAmountTaxExcl()
    {
        return $this->reductionAmountTaxExcl;
    }

    public function setReductionAmountTaxExcl($reductionAmountTaxExcl): self
    {
        $this->reductionAmountTaxExcl = $reductionAmountTaxExcl;

        return $this;
    }

    public function getGroupReduction()
    {
        return $this->groupReduction;
    }

    public function setGroupReduction($groupReduction): self
    {
        $this->groupReduction = $groupReduction;

        return $this;
    }

    public function getProductQuantityDiscount()
    {
        return $this->productQuantityDiscount;
    }

    public function setProductQuantityDiscount($productQuantityDiscount): self
    {
        $this->productQuantityDiscount = $productQuantityDiscount;

        return $this;
    }

    public function getProductEan13(): ?string
    {
        return $this->productEan13;
    }

    public function setProductEan13(?string $productEan13): self
    {
        $this->productEan13 = $productEan13;

        return $this;
    }

    public function getProductIsbn(): ?string
    {
        return $this->productIsbn;
    }

    public function setProductIsbn(?string $productIsbn): self
    {
        $this->productIsbn = $productIsbn;

        return $this;
    }

    public function getProductUpc(): ?string
    {
        return $this->productUpc;
    }

    public function setProductUpc(?string $productUpc): self
    {
        $this->productUpc = $productUpc;

        return $this;
    }

    public function getProductReference(): ?string
    {
        return $this->productReference;
    }

    public function setProductReference(?string $productReference): self
    {
        $this->productReference = $productReference;

        return $this;
    }

    public function getProductSupplierReference(): ?string
    {
        return $this->productSupplierReference;
    }

    public function setProductSupplierReference(?string $productSupplierReference): self
    {
        $this->productSupplierReference = $productSupplierReference;

        return $this;
    }

    public function getProductWeight()
    {
        return $this->productWeight;
    }

    public function setProductWeight($productWeight): self
    {
        $this->productWeight = $productWeight;

        return $this;
    }

    public function getIdTaxRulesGroup(): ?int
    {
        return $this->idTaxRulesGroup;
    }

    public function setIdTaxRulesGroup(?int $idTaxRulesGroup): self
    {
        $this->idTaxRulesGroup = $idTaxRulesGroup;

        return $this;
    }

    public function getTaxComputationMethod(): ?bool
    {
        return $this->taxComputationMethod;
    }

    public function setTaxComputationMethod(bool $taxComputationMethod): self
    {
        $this->taxComputationMethod = $taxComputationMethod;

        return $this;
    }

    public function getTaxName(): ?string
    {
        return $this->taxName;
    }

    public function setTaxName(string $taxName): self
    {
        $this->taxName = $taxName;

        return $this;
    }

    public function getTaxRate()
    {
        return $this->taxRate;
    }

    public function setTaxRate($taxRate): self
    {
        $this->taxRate = $taxRate;

        return $this;
    }

    public function getEcotax()
    {
        return $this->ecotax;
    }

    public function setEcotax($ecotax): self
    {
        $this->ecotax = $ecotax;

        return $this;
    }

    public function getEcotaxTaxRate()
    {
        return $this->ecotaxTaxRate;
    }

    public function setEcotaxTaxRate($ecotaxTaxRate): self
    {
        $this->ecotaxTaxRate = $ecotaxTaxRate;

        return $this;
    }

    public function getDiscountQuantityApplied(): ?bool
    {
        return $this->discountQuantityApplied;
    }

    public function setDiscountQuantityApplied(bool $discountQuantityApplied): self
    {
        $this->discountQuantityApplied = $discountQuantityApplied;

        return $this;
    }

    public function getDownloadHash(): ?string
    {
        return $this->downloadHash;
    }

    public function setDownloadHash(?string $downloadHash): self
    {
        $this->downloadHash = $downloadHash;

        return $this;
    }

    public function getDownloadNb(): ?int
    {
        return $this->downloadNb;
    }

    public function setDownloadNb(?int $downloadNb): self
    {
        $this->downloadNb = $downloadNb;

        return $this;
    }

    public function getDownloadDeadline(): ?\DateTimeInterface
    {
        return $this->downloadDeadline;
    }

    public function setDownloadDeadline(?\DateTimeInterface $downloadDeadline): self
    {
        $this->downloadDeadline = $downloadDeadline;

        return $this;
    }

    public function getTotalPriceTaxIncl()
    {
        return $this->totalPriceTaxIncl;
    }

    public function setTotalPriceTaxIncl($totalPriceTaxIncl): self
    {
        $this->totalPriceTaxIncl = $totalPriceTaxIncl;

        return $this;
    }

    public function getTotalPriceTaxExcl()
    {
        return $this->totalPriceTaxExcl;
    }

    public function setTotalPriceTaxExcl($totalPriceTaxExcl): self
    {
        $this->totalPriceTaxExcl = $totalPriceTaxExcl;

        return $this;
    }

    public function getUnitPriceTaxIncl()
    {
        return $this->unitPriceTaxIncl;
    }

    public function setUnitPriceTaxIncl($unitPriceTaxIncl): self
    {
        $this->unitPriceTaxIncl = $unitPriceTaxIncl;

        return $this;
    }

    public function getUnitPriceTaxExcl()
    {
        return $this->unitPriceTaxExcl;
    }

    public function setUnitPriceTaxExcl($unitPriceTaxExcl): self
    {
        $this->unitPriceTaxExcl = $unitPriceTaxExcl;

        return $this;
    }

    public function getTotalShippingPriceTaxIncl()
    {
        return $this->totalShippingPriceTaxIncl;
    }

    public function setTotalShippingPriceTaxIncl($totalShippingPriceTaxIncl): self
    {
        $this->totalShippingPriceTaxIncl = $totalShippingPriceTaxIncl;

        return $this;
    }

    public function getTotalShippingPriceTaxExcl()
    {
        return $this->totalShippingPriceTaxExcl;
    }

    public function setTotalShippingPriceTaxExcl($totalShippingPriceTaxExcl): self
    {
        $this->totalShippingPriceTaxExcl = $totalShippingPriceTaxExcl;

        return $this;
    }

    public function getPurchaseSupplierPrice()
    {
        return $this->purchaseSupplierPrice;
    }

    public function setPurchaseSupplierPrice($purchaseSupplierPrice): self
    {
        $this->purchaseSupplierPrice = $purchaseSupplierPrice;

        return $this;
    }

    public function getOriginalProductPrice()
    {
        return $this->originalProductPrice;
    }

    public function setOriginalProductPrice($originalProductPrice): self
    {
        $this->originalProductPrice = $originalProductPrice;

        return $this;
    }

    public function getOriginalWholesalePrice()
    {
        return $this->originalWholesalePrice;
    }

    public function setOriginalWholesalePrice($originalWholesalePrice): self
    {
        $this->originalWholesalePrice = $originalWholesalePrice;

        return $this;
    }


}
