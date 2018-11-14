<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CartProductRepository")
 */
class CartProduct
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="cartProduct")
     * @var Product
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity=Cart::class, inversedBy="cartProduct")
     * @var Cart
     */
    private $cart;

    /**
     * @ORM\ManyToOne(targetEntity=ProductAttribute::class, inversedBy="cartProduct")
     * @var ProductAttribute
     */
    private $productAttribute;

    /**
     * @ORM\ManyToOne(targetEntity=Shop::class, inversedBy="cartProduct")
     * @var Shop
     */
    private $shop;

    /**
     * @ORM\Column(type="integer")
     * @var integer $quantity
     */
    private $quantity;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime $created_at
     */
    private $created_at;

    /**
     * CartProduct constructor.
     */
    public function __construct()
    {
        $this->created_at = new \DateTime();
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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getCart(): ?Cart
    {
        return $this->cart;
    }

    public function setCart(?Cart $cart): self
    {
        $this->cart = $cart;

        return $this;
    }

    public function getProductAttribute(): ?ProductAttribute
    {
        return $this->productAttribute;
    }

    public function setProductAttribute(?ProductAttribute $productAttribute): self
    {
        $this->productAttribute = $productAttribute;

        return $this;
    }

    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    public function setShop(?Shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }


}
