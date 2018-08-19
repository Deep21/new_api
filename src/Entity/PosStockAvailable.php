<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosStockAvailable
 *
 * @ORM\Table(name="pos_stock_available", uniqueConstraints={@ORM\UniqueConstraint(name="product_sqlstock", columns={"id_product", "id_product_attribute", "id_shop", "id_shop_group"})}, indexes={@ORM\Index(name="id_shop", columns={"id_shop"}), @ORM\Index(name="id_shop_group", columns={"id_shop_group"}), @ORM\Index(name="id_product", columns={"id_product"}), @ORM\Index(name="id_product_attribute", columns={"id_product_attribute"})})
 * @ORM\Entity
 */
class PosStockAvailable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_stock_available", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idStockAvailable;

    /**
     * @var int
     *
     * @ORM\Column(name="id_product", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idProduct;

    /**
     * @var int
     *
     * @ORM\Column(name="id_product_attribute", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idProductAttribute;

    /**
     * @var int
     *
     * @ORM\Column(name="id_shop", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idShop;

    /**
     * @var int
     *
     * @ORM\Column(name="id_shop_group", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idShopGroup;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="physical_quantity", type="integer", nullable=false)
     */
    private $physicalQuantity = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="reserved_quantity", type="integer", nullable=false)
     */
    private $reservedQuantity = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="depends_on_stock", type="boolean", nullable=false)
     */
    private $dependsOnStock = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="out_of_stock", type="boolean", nullable=false)
     */
    private $outOfStock = '0';

    public function getIdStockAvailable(): ?int
    {
        return $this->idStockAvailable;
    }

    public function setIdStockAvailable(int $idStockAvailable): self
    {
        $this->idStockAvailable = $idStockAvailable;

        return $this;
    }

    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct): self
    {
        $this->idProduct = $idProduct;

        return $this;
    }

    public function getIdProductAttribute(): ?int
    {
        return $this->idProductAttribute;
    }

    public function setIdProductAttribute(int $idProductAttribute): self
    {
        $this->idProductAttribute = $idProductAttribute;

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

    public function getIdShopGroup(): ?int
    {
        return $this->idShopGroup;
    }

    public function setIdShopGroup(int $idShopGroup): self
    {
        $this->idShopGroup = $idShopGroup;

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

    public function getPhysicalQuantity(): ?int
    {
        return $this->physicalQuantity;
    }

    public function setPhysicalQuantity(int $physicalQuantity): self
    {
        $this->physicalQuantity = $physicalQuantity;

        return $this;
    }

    public function getReservedQuantity(): ?int
    {
        return $this->reservedQuantity;
    }

    public function setReservedQuantity(int $reservedQuantity): self
    {
        $this->reservedQuantity = $reservedQuantity;

        return $this;
    }

    public function getDependsOnStock(): ?bool
    {
        return $this->dependsOnStock;
    }

    public function setDependsOnStock(bool $dependsOnStock): self
    {
        $this->dependsOnStock = $dependsOnStock;

        return $this;
    }

    public function getOutOfStock(): ?bool
    {
        return $this->outOfStock;
    }

    public function setOutOfStock(bool $outOfStock): self
    {
        $this->outOfStock = $outOfStock;

        return $this;
    }


}
