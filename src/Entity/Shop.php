<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Shop.
 *
 * @ORM\Entity(repositoryClass="App\Repository\ShopRepository")
 */
class Shop
{
    /**
     * @var                                         Collection|Customer[]
     * @ORM\OneToMany(targetEntity=Customer::class, cascade={"persist", "remove"}, mappedBy="shop")
     */
    private $customer;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var                                      Collection|order[]
     * @ORM\OneToMany(targetEntity=Order::class, cascade={"persist", "remove"}, mappedBy="shop")
     */
    private $order;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDeleted;

    /**
     * Shop constructor.
     */
    public function __construct()
    {
        $this->customer = new ArrayCollection();
        $this->order = new ArrayCollection();
    }

    /**
     * @return Customer[]|Collection
     */
    public function getCustomer(): Collection
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function addCustomer(Customer $customer): void
    {
        $this->customer->add($customer);
        $customer->setShop($this);
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): self
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    public function removeCustomer(Customer $customer): self
    {
        if ($this->customer->contains($customer)) {
            $this->customer->removeElement($customer);
            // set the owning side to null (unless already changed)
            if ($customer->getShop() === $this) {
                $customer->setShop(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Shop[]
     */
    public function getOrder(): Collection
    {
        return $this->order;
    }

    public function addOrder(Shop $order): self
    {
        if (!$this->order->contains($order)) {
            $this->order[] = $order;
            $order->setShop($this);
        }

        return $this;
    }

    public function removeOrder(Shop $order): self
    {
        if ($this->order->contains($order)) {
            $this->order->removeElement($order);
            // set the owning side to null (unless already changed)
            if ($order->getShop() === $this) {
                $order->setShop(null);
            }
        }

        return $this;
    }
}
