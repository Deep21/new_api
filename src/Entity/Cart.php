<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * CartProduct.
 *
 * @ORM\Entity(repositoryClass="App\Repository\CartRepository")
 */
class Cart
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, cascade={"persist", "remove"}, mappedBy="cart")
     * @var Collection|Order[]
     */
    private $order;

    /**
     * @ORM\ManyToOne(targetEntity=Employee::class, cascade={"persist", "remove"}, inversedBy="cart")
     * @var Employee
     */
    private $employee;

    /**
     * @ORM\OneToMany(targetEntity=CartProduct::class, cascade={"persist", "remove"}, mappedBy="cart")
     * @var Collection|\App\Model\CartProduct[]
     */
    private $cartProduct;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTimeInterface
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTimeInterface
     */
    private $updated_at;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_recyclable;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_gift;

    public function __construct()
    {
        $this->order = new ArrayCollection();
        $this->created_at = new \DateTime();
        $this->updated_at = new \DateTime();
        $this->cartProduct = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrder(): Collection
    {
        return $this->order;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->order->contains($order)) {
            $this->order[] = $order;
            $order->setCart($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->order->contains($order)) {
            $this->order->removeElement($order);
            // set the owning side to null (unless already changed)
            if ($order->getCart() === $this) {
                $order->setCart(null);
            }
        }

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

    public function getIsRecyclable(): ?bool
    {
        return $this->is_recyclable;
    }

    public function setIsRecyclable(?bool $is_recyclable): self
    {
        $this->is_recyclable = $is_recyclable;

        return $this;
    }

    public function getIsGift(): ?bool
    {
        return $this->is_gift;
    }

    public function setIsGift(?bool $is_gift): self
    {
        $this->is_gift = $is_gift;

        return $this;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): self
    {
        $this->employee = $employee;

        return $this;
    }



    public function addCartProduct(CartProduct $cartProduct): self
    {
        if (!$this->cartProduct->contains($cartProduct)) {
            $this->cartProduct[] = $cartProduct;
            $cartProduct->setCart($this);
        }

        return $this;
    }

    public function removeCartProduct(CartProduct $cartProduct): self
    {
        if ($this->cartProduct->contains($cartProduct)) {
            $this->cartProduct->removeElement($cartProduct);
            // set the owning side to null (unless already changed)
            if ($cartProduct->getCart() === $this) {
                $cartProduct->setCart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CartProduct[]
     */
    public function getCartProduct(): Collection
    {
        return $this->cartProduct;
    }

}
