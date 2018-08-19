<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosImageType
 *
 * @ORM\Table(name="pos_image_type", indexes={@ORM\Index(name="image_type_name", columns={"name"})})
 * @ORM\Entity
 */
class PosImageType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_image_type", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idImageType;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="width", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $width;

    /**
     * @var int
     *
     * @ORM\Column(name="height", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $height;

    /**
     * @var bool
     *
     * @ORM\Column(name="products", type="boolean", nullable=false, options={"default"="1"})
     */
    private $products = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="categories", type="boolean", nullable=false, options={"default"="1"})
     */
    private $categories = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="manufacturers", type="boolean", nullable=false, options={"default"="1"})
     */
    private $manufacturers = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="suppliers", type="boolean", nullable=false, options={"default"="1"})
     */
    private $suppliers = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="stores", type="boolean", nullable=false, options={"default"="1"})
     */
    private $stores = '1';

    public function getIdImageType(): ?int
    {
        return $this->idImageType;
    }

    public function setIdImageType(int $idImageType): self
    {
        $this->idImageType = $idImageType;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getProducts(): ?bool
    {
        return $this->products;
    }

    public function setProducts(bool $products): self
    {
        $this->products = $products;

        return $this;
    }

    public function getCategories(): ?bool
    {
        return $this->categories;
    }

    public function setCategories(bool $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function getManufacturers(): ?bool
    {
        return $this->manufacturers;
    }

    public function setManufacturers(bool $manufacturers): self
    {
        $this->manufacturers = $manufacturers;

        return $this;
    }

    public function getSuppliers(): ?bool
    {
        return $this->suppliers;
    }

    public function setSuppliers(bool $suppliers): self
    {
        $this->suppliers = $suppliers;

        return $this;
    }

    public function getStores(): ?bool
    {
        return $this->stores;
    }

    public function setStores(bool $stores): self
    {
        $this->stores = $stores;

        return $this;
    }


}
