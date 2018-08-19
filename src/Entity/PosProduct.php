<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosProduct
 *
 * @ORM\Table(name="pos_product", indexes={@ORM\Index(name="product_supplier", columns={"id_supplier"}), @ORM\Index(name="product_manufacturer", columns={"id_manufacturer", "id_product"}), @ORM\Index(name="id_category_default", columns={"id_category_default"}), @ORM\Index(name="indexed", columns={"indexed"}), @ORM\Index(name="date_add", columns={"date_add"}), @ORM\Index(name="state", columns={"state", "date_upd"})})
 * @ORM\Entity
 */
class PosProduct
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_product", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idProduct;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_supplier", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $idSupplier;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_manufacturer", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $idManufacturer;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_category_default", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $idCategoryDefault;

    /**
     * @var int
     *
     * @ORM\Column(name="id_shop_default", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $idShopDefault = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="id_tax_rules_group", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idTaxRulesGroup;

    /**
     * @var bool
     *
     * @ORM\Column(name="on_sale", type="boolean", nullable=false)
     */
    private $onSale = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="online_only", type="boolean", nullable=false)
     */
    private $onlineOnly = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ean13", type="string", length=13, nullable=true)
     */
    private $ean13;

    /**
     * @var string|null
     *
     * @ORM\Column(name="isbn", type="string", length=32, nullable=true)
     */
    private $isbn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="upc", type="string", length=12, nullable=true)
     */
    private $upc;

    /**
     * @var string
     *
     * @ORM\Column(name="ecotax", type="decimal", precision=17, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $ecotax = '0.000000';

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="minimal_quantity", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $minimalQuantity = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="low_stock_threshold", type="integer", nullable=true)
     */
    private $lowStockThreshold;

    /**
     * @var bool
     *
     * @ORM\Column(name="low_stock_alert", type="boolean", nullable=false)
     */
    private $lowStockAlert = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $price = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="wholesale_price", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $wholesalePrice = '0.000000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="unity", type="string", length=255, nullable=true)
     */
    private $unity;

    /**
     * @var string
     *
     * @ORM\Column(name="unit_price_ratio", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $unitPriceRatio = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="additional_shipping_cost", type="decimal", precision=20, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $additionalShippingCost = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference", type="string", length=32, nullable=true)
     */
    private $reference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="supplier_reference", type="string", length=32, nullable=true)
     */
    private $supplierReference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="location", type="string", length=64, nullable=true)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="width", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $width = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="height", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $height = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="depth", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $depth = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $weight = '0.000000';

    /**
     * @var int
     *
     * @ORM\Column(name="out_of_stock", type="integer", nullable=false, options={"default"="2","unsigned"=true})
     */
    private $outOfStock = '2';

    /**
     * @var bool
     *
     * @ORM\Column(name="additional_delivery_times", type="boolean", nullable=false, options={"default"="1"})
     */
    private $additionalDeliveryTimes = '1';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="quantity_discount", type="boolean", nullable=true)
     */
    private $quantityDiscount = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="customizable", type="boolean", nullable=false)
     */
    private $customizable = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="uploadable_files", type="boolean", nullable=false)
     */
    private $uploadableFiles = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="text_fields", type="boolean", nullable=false)
     */
    private $textFields = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="redirect_type", type="string", length=0, nullable=false)
     */
    private $redirectType = '';

    /**
     * @var int
     *
     * @ORM\Column(name="id_type_redirected", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idTypeRedirected = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="available_for_order", type="boolean", nullable=false, options={"default"="1"})
     */
    private $availableForOrder = '1';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="available_date", type="date", nullable=true)
     */
    private $availableDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="show_condition", type="boolean", nullable=false)
     */
    private $showCondition = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="condition", type="string", length=0, nullable=false, options={"default"="new"})
     */
    private $condition = 'new';

    /**
     * @var bool
     *
     * @ORM\Column(name="show_price", type="boolean", nullable=false, options={"default"="1"})
     */
    private $showPrice = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="indexed", type="boolean", nullable=false)
     */
    private $indexed = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="visibility", type="string", length=0, nullable=false, options={"default"="both"})
     */
    private $visibility = 'both';

    /**
     * @var bool
     *
     * @ORM\Column(name="cache_is_pack", type="boolean", nullable=false)
     */
    private $cacheIsPack = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="cache_has_attachments", type="boolean", nullable=false)
     */
    private $cacheHasAttachments = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_virtual", type="boolean", nullable=false)
     */
    private $isVirtual = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="cache_default_attribute", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $cacheDefaultAttribute;

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
     * @var bool
     *
     * @ORM\Column(name="advanced_stock_management", type="boolean", nullable=false)
     */
    private $advancedStockManagement = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="pack_stock_type", type="integer", nullable=false, options={"default"="3","unsigned"=true})
     */
    private $packStockType = '3';

    /**
     * @var int
     *
     * @ORM\Column(name="state", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $state = '1';

    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct): self
    {
        $this->idProduct = $idProduct;

        return $this;
    }

    public function getIdSupplier(): ?int
    {
        return $this->idSupplier;
    }

    public function setIdSupplier(?int $idSupplier): self
    {
        $this->idSupplier = $idSupplier;

        return $this;
    }

    public function getIdManufacturer(): ?int
    {
        return $this->idManufacturer;
    }

    public function setIdManufacturer(?int $idManufacturer): self
    {
        $this->idManufacturer = $idManufacturer;

        return $this;
    }

    public function getIdCategoryDefault(): ?int
    {
        return $this->idCategoryDefault;
    }

    public function setIdCategoryDefault(?int $idCategoryDefault): self
    {
        $this->idCategoryDefault = $idCategoryDefault;

        return $this;
    }

    public function getIdShopDefault(): ?int
    {
        return $this->idShopDefault;
    }

    public function setIdShopDefault(int $idShopDefault): self
    {
        $this->idShopDefault = $idShopDefault;

        return $this;
    }

    public function getIdTaxRulesGroup(): ?int
    {
        return $this->idTaxRulesGroup;
    }

    public function setIdTaxRulesGroup(int $idTaxRulesGroup): self
    {
        $this->idTaxRulesGroup = $idTaxRulesGroup;

        return $this;
    }

    public function getOnSale(): ?bool
    {
        return $this->onSale;
    }

    public function setOnSale(bool $onSale): self
    {
        $this->onSale = $onSale;

        return $this;
    }

    public function getOnlineOnly(): ?bool
    {
        return $this->onlineOnly;
    }

    public function setOnlineOnly(bool $onlineOnly): self
    {
        $this->onlineOnly = $onlineOnly;

        return $this;
    }

    public function getEan13(): ?string
    {
        return $this->ean13;
    }

    public function setEan13(?string $ean13): self
    {
        $this->ean13 = $ean13;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getUpc(): ?string
    {
        return $this->upc;
    }

    public function setUpc(?string $upc): self
    {
        $this->upc = $upc;

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

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getMinimalQuantity(): ?int
    {
        return $this->minimalQuantity;
    }

    public function setMinimalQuantity(int $minimalQuantity): self
    {
        $this->minimalQuantity = $minimalQuantity;

        return $this;
    }

    public function getLowStockThreshold(): ?int
    {
        return $this->lowStockThreshold;
    }

    public function setLowStockThreshold(?int $lowStockThreshold): self
    {
        $this->lowStockThreshold = $lowStockThreshold;

        return $this;
    }

    public function getLowStockAlert(): ?bool
    {
        return $this->lowStockAlert;
    }

    public function setLowStockAlert(bool $lowStockAlert): self
    {
        $this->lowStockAlert = $lowStockAlert;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getWholesalePrice()
    {
        return $this->wholesalePrice;
    }

    public function setWholesalePrice($wholesalePrice): self
    {
        $this->wholesalePrice = $wholesalePrice;

        return $this;
    }

    public function getUnity(): ?string
    {
        return $this->unity;
    }

    public function setUnity(?string $unity): self
    {
        $this->unity = $unity;

        return $this;
    }

    public function getUnitPriceRatio()
    {
        return $this->unitPriceRatio;
    }

    public function setUnitPriceRatio($unitPriceRatio): self
    {
        $this->unitPriceRatio = $unitPriceRatio;

        return $this;
    }

    public function getAdditionalShippingCost()
    {
        return $this->additionalShippingCost;
    }

    public function setAdditionalShippingCost($additionalShippingCost): self
    {
        $this->additionalShippingCost = $additionalShippingCost;

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

    public function getSupplierReference(): ?string
    {
        return $this->supplierReference;
    }

    public function setSupplierReference(?string $supplierReference): self
    {
        $this->supplierReference = $supplierReference;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getDepth()
    {
        return $this->depth;
    }

    public function setDepth($depth): self
    {
        $this->depth = $depth;

        return $this;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getOutOfStock(): ?int
    {
        return $this->outOfStock;
    }

    public function setOutOfStock(int $outOfStock): self
    {
        $this->outOfStock = $outOfStock;

        return $this;
    }

    public function getAdditionalDeliveryTimes(): ?bool
    {
        return $this->additionalDeliveryTimes;
    }

    public function setAdditionalDeliveryTimes(bool $additionalDeliveryTimes): self
    {
        $this->additionalDeliveryTimes = $additionalDeliveryTimes;

        return $this;
    }

    public function getQuantityDiscount(): ?bool
    {
        return $this->quantityDiscount;
    }

    public function setQuantityDiscount(?bool $quantityDiscount): self
    {
        $this->quantityDiscount = $quantityDiscount;

        return $this;
    }

    public function getCustomizable(): ?bool
    {
        return $this->customizable;
    }

    public function setCustomizable(bool $customizable): self
    {
        $this->customizable = $customizable;

        return $this;
    }

    public function getUploadableFiles(): ?bool
    {
        return $this->uploadableFiles;
    }

    public function setUploadableFiles(bool $uploadableFiles): self
    {
        $this->uploadableFiles = $uploadableFiles;

        return $this;
    }

    public function getTextFields(): ?bool
    {
        return $this->textFields;
    }

    public function setTextFields(bool $textFields): self
    {
        $this->textFields = $textFields;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getRedirectType(): ?string
    {
        return $this->redirectType;
    }

    public function setRedirectType(string $redirectType): self
    {
        $this->redirectType = $redirectType;

        return $this;
    }

    public function getIdTypeRedirected(): ?int
    {
        return $this->idTypeRedirected;
    }

    public function setIdTypeRedirected(int $idTypeRedirected): self
    {
        $this->idTypeRedirected = $idTypeRedirected;

        return $this;
    }

    public function getAvailableForOrder(): ?bool
    {
        return $this->availableForOrder;
    }

    public function setAvailableForOrder(bool $availableForOrder): self
    {
        $this->availableForOrder = $availableForOrder;

        return $this;
    }

    public function getAvailableDate(): ?\DateTimeInterface
    {
        return $this->availableDate;
    }

    public function setAvailableDate(?\DateTimeInterface $availableDate): self
    {
        $this->availableDate = $availableDate;

        return $this;
    }

    public function getShowCondition(): ?bool
    {
        return $this->showCondition;
    }

    public function setShowCondition(bool $showCondition): self
    {
        $this->showCondition = $showCondition;

        return $this;
    }

    public function getCondition(): ?string
    {
        return $this->condition;
    }

    public function setCondition(string $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    public function getShowPrice(): ?bool
    {
        return $this->showPrice;
    }

    public function setShowPrice(bool $showPrice): self
    {
        $this->showPrice = $showPrice;

        return $this;
    }

    public function getIndexed(): ?bool
    {
        return $this->indexed;
    }

    public function setIndexed(bool $indexed): self
    {
        $this->indexed = $indexed;

        return $this;
    }

    public function getVisibility(): ?string
    {
        return $this->visibility;
    }

    public function setVisibility(string $visibility): self
    {
        $this->visibility = $visibility;

        return $this;
    }

    public function getCacheIsPack(): ?bool
    {
        return $this->cacheIsPack;
    }

    public function setCacheIsPack(bool $cacheIsPack): self
    {
        $this->cacheIsPack = $cacheIsPack;

        return $this;
    }

    public function getCacheHasAttachments(): ?bool
    {
        return $this->cacheHasAttachments;
    }

    public function setCacheHasAttachments(bool $cacheHasAttachments): self
    {
        $this->cacheHasAttachments = $cacheHasAttachments;

        return $this;
    }

    public function getIsVirtual(): ?bool
    {
        return $this->isVirtual;
    }

    public function setIsVirtual(bool $isVirtual): self
    {
        $this->isVirtual = $isVirtual;

        return $this;
    }

    public function getCacheDefaultAttribute(): ?int
    {
        return $this->cacheDefaultAttribute;
    }

    public function setCacheDefaultAttribute(?int $cacheDefaultAttribute): self
    {
        $this->cacheDefaultAttribute = $cacheDefaultAttribute;

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

    public function getAdvancedStockManagement(): ?bool
    {
        return $this->advancedStockManagement;
    }

    public function setAdvancedStockManagement(bool $advancedStockManagement): self
    {
        $this->advancedStockManagement = $advancedStockManagement;

        return $this;
    }

    public function getPackStockType(): ?int
    {
        return $this->packStockType;
    }

    public function setPackStockType(int $packStockType): self
    {
        $this->packStockType = $packStockType;

        return $this;
    }

    public function getState(): ?int
    {
        return $this->state;
    }

    public function setState(int $state): self
    {
        $this->state = $state;

        return $this;
    }


}
