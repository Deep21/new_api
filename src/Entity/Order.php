<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Order.
 *
 * @ORM\Table(name="`order`")
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
{
    /**
     * @var                                            Collection|OrderDetail[]
     * @ORM\OneToMany(targetEntity=OrderDetail::class, cascade={"persist", "remove"}, mappedBy="order")
     */
    private $orderDetail;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"order"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Shop::class, inversedBy="order")
     */
    private $shop;

    /**
     * @ORM\ManyToOne(targetEntity=Cart::class, inversedBy="order")
     */
    private $cart;

    /**
     * @ORM\ManyToOne(targetEntity=Currency::class, inversedBy="order")
     */
    private $currency;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="order")
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity=Address::class, inversedBy="orderAddressDelivery")
     */
    private $address_delivery;

    /**
     * @ORM\ManyToOne(targetEntity=Address::class, inversedBy="orderAddressInvoice")
     */
    private $address_invoice;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $reference;

    /**
     * @ORM\Column(type="integer")
     */
    private $current_state;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $invoice_number;

    public function __construct()
    {
        $this->orderDetail = new ArrayCollection();
        $this->setCreatedAt(new \DateTime('now'));
        $this->setUpdatedAt(new \DateTime('now'));
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    public function setShop(?Shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }

    public function getCart(): ? Cart
    {
        return $this->cart;
    }

    public function setCart(?Cart $cart): self
    {
        $this->cart = $cart;

        return $this;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getAddressDelivery(): ?Address
    {
        return $this->address_delivery;
    }

    public function setAddressDelivery(?Address $address_delivery): self
    {
        $this->address_delivery = $address_delivery;

        return $this;
    }

    public function getAddressInvoice(): ?Address
    {
        return $this->address_invoice;
    }

    public function setAddressInvoice(?Address $address_invoice): self
    {
        $this->address_invoice = $address_invoice;

        return $this;
    }

    public function getCurrentState(): ?int
    {
        return $this->current_state;
    }

    public function setCurrentState(int $current_state): self
    {
        $this->current_state = $current_state;

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

    public function getInvoiceNumber(): ?int
    {
        return $this->invoice_number;
    }

    public function setInvoiceNumber(int $invoice_number): self
    {
        $this->invoice_number = $invoice_number;

        return $this;
    }

    /**
     * @return Collection|OrderDetail[]
     */
    public function getOrderDetail(): Collection
    {
        return $this->orderDetail;
    }

    public function addOrderDetail(OrderDetail $orderDetail): self
    {
        if (!$this->orderDetail->contains($orderDetail)) {
            $this->orderDetail[] = $orderDetail;
            $orderDetail->setOrder($this);
        }

        return $this;
    }

    public function removeOrderDetail(OrderDetail $orderDetail): self
    {
        if ($this->orderDetail->contains($orderDetail)) {
            $this->orderDetail->removeElement($orderDetail);
            // set the owning side to null (unless already changed)
            if ($orderDetail->getOrder() === $this) {
                $orderDetail->setOrder(null);
            }
        }

        return $this;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}
