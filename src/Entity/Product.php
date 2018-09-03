<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"product"})
     */
    private $id;

    /**
     * @var                                                 Collection|ProductAttribute[]
     * @ORM\OneToMany(targetEntity=ProductAttribute::class, mappedBy="product")
     * @Groups({"product"})
     */
    private $productAttribute;

    /**
     * @ORM\OneToMany(targetEntity=CartProduct::class, mappedBy="product")
     * @Groups({"product"})
     *
     * @var Product
     * */
    private $cartProduct;

    /**
     * @ORM\ManyToOne(targetEntity=Manufacturer::class, inversedBy="product")
     * @Groups({"product"})
     *
     * @var Collection|Manufacturer[]
     */
    private $manufacturer;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"product"})
     */
    private $quantity;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"product"})
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"product"})
     */
    private $updated_at;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     * @Groups({"product"})
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $minimal_quantity;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_active;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $reference;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $wholesale_price;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $ecotax;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $upc;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $isbn;

    /**
     * @ORM\Column(type="string", length=13, nullable=true)
     */
    private $ean13;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_on_sale;

    public function __construct()
    {
        $this->manufacturer = new ArrayCollection();
        $this->productAttribute = new ArrayCollection();
        $this->cartProduct = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

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

    /**
     * @return Collection|ProductAttribute[]
     */
    public function getProductAttribute(): Collection
    {
        return $this->productAttribute;
    }

    public function addProductAttribute(ProductAttribute $productAttribute): self
    {
        if (!$this->productAttribute->contains($productAttribute)) {
            $this->productAttribute[] = $productAttribute;
            $productAttribute->setProduct($this);
        }

        return $this;
    }

    public function removeProductAttribute(ProductAttribute $productAttribute): self
    {
        if ($this->productAttribute->contains($productAttribute)) {
            $this->productAttribute->removeElement($productAttribute);
            // set the owning side to null (unless already changed)
            if ($productAttribute->getProduct() === $this) {
                $productAttribute->setProduct(null);
            }
        }

        return $this;
    }

    public function getMinimalQuantity(): ?int
    {
        return $this->minimal_quantity;
    }

    public function setMinimalQuantity(int $minimal_quantity): self
    {
        $this->minimal_quantity = $minimal_quantity;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): self
    {
        $this->is_active = $is_active;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getWholesalePrice()
    {
        return $this->wholesale_price;
    }

    public function setWholesalePrice($wholesale_price): self
    {
        $this->wholesale_price = $wholesale_price;

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

    public function getUpc(): ?string
    {
        return $this->upc;
    }

    public function setUpc(string $upc): self
    {
        $this->upc = $upc;

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

    public function getEan13(): ?string
    {
        return $this->ean13;
    }

    public function setEan13(?string $ean13): self
    {
        $this->ean13 = $ean13;

        return $this;
    }

    public function getIsOnSale(): ?bool
    {
        return $this->is_on_sale;
    }

    public function setIsOnSale(?bool $is_on_sale): self
    {
        $this->is_on_sale = $is_on_sale;

        return $this;
    }

    public function setManufacturer(?Manufacturer $manufacturer): self
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    public function getManufacturer(): Collection
    {
        return $this->manufacturer;
    }

    /**
     * @return Collection|Manufacturer[]
     */
    public function getCartProduct(): Collection
    {
        return $this->cartProduct;
    }

    public function addCartProduct(CartProduct $cartProduct): self
    {
        if (!$this->cartProduct->contains($cartProduct)) {
            $this->cartProduct[] = $cartProduct;
            $cartProduct->setProduct($this);
        }

        return $this;
    }

    public function removeCartProduct(CartProduct $cartProduct): self
    {
        if ($this->cartProduct->contains($cartProduct)) {
            $this->cartProduct->removeElement($cartProduct);
            // set the owning side to null (unless already changed)
            if ($cartProduct->getProduct() === $this) {
                $cartProduct->setProduct(null);
            }
        }

        return $this;
    }
}
