<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductAttributeRepository")
 */
class ProductAttribute
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var                                            Collection|CartProduct[]
     * @ORM\OneToMany(targetEntity=CartProduct::class, cascade={"persist", "remove"}, mappedBy="productAttribute")
     * @Groups({"product"})
     */
    private $cartProduct;

    /**
     * @ORM\ManyToOne(targetEntity=CartProduct::class, inversedBy="productAttribute")
     */
    private $product;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $ecotax;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $wholesale_price;

    public function __construct()
    {
        $this->cartProduct = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEcotax()
    {
        return $this->ecotax;
    }

    public function setEcotax($ecotax): self
    {
        $this->ecotax = $ecotax;

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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Collection|CartProduct[]
     */
    public function getCartProduct(): Collection
    {
        return $this->cartProduct;
    }

    public function addCartProduct(CartProduct $cartProduct): self
    {
        if (!$this->cartProduct->contains($cartProduct)) {
            $this->cartProduct[] = $cartProduct;
            $cartProduct->setProductAttribute($this);
        }

        return $this;
    }

    public function removeCartProduct(CartProduct $cartProduct): self
    {
        if ($this->cartProduct->contains($cartProduct)) {
            $this->cartProduct->removeElement($cartProduct);
            // set the owning side to null (unless already changed)
            if ($cartProduct->getProductAttribute() === $this) {
                $cartProduct->setProductAttribute(null);
            }
        }

        return $this;
    }
}
