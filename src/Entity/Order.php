<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 * @Table(name="new_api.order")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $reference;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_customer;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_cart;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_currency;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_address_delivery;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_address_invoice;

    /**
     * @ORM\Column(type="integer")
     */
    private $invoice_number;

    /**
     * @ORM\Column(type="decimal", precision=20, scale=0, nullable=true)
     */
    private $total_discounts;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

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

    public function getIdCustomer(): ?int
    {
        return $this->id_customer;
    }

    public function setIdCustomer(int $id_customer): self
    {
        $this->id_customer = $id_customer;

        return $this;
    }

    public function getIdCart(): ?int
    {
        return $this->id_cart;
    }

    public function setIdCart(int $id_cart): self
    {
        $this->id_cart = $id_cart;

        return $this;
    }

    public function getIdCurrency(): ?int
    {
        return $this->id_currency;
    }

    public function setIdCurrency(int $id_currency): self
    {
        $this->id_currency = $id_currency;

        return $this;
    }

    public function getIdAddressDelivery(): ?int
    {
        return $this->id_address_delivery;
    }

    public function setIdAddressDelivery(int $id_address_delivery): self
    {
        $this->id_address_delivery = $id_address_delivery;

        return $this;
    }

    public function getIdAddressInvoice(): ?int
    {
        return $this->id_address_invoice;
    }

    public function setIdAddressInvoice(int $id_address_invoice): self
    {
        $this->id_address_invoice = $id_address_invoice;

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

    public function getTotalDiscounts()
    {
        return $this->total_discounts;
    }

    public function setTotalDiscounts($total_discounts): self
    {
        $this->total_discounts = $total_discounts;

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
}
