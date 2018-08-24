<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShopGroupRepository")
 */
class ShopGroup
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $share_customer;

    /**
     * @ORM\Column(type="boolean")
     */
    private $share_order;

    /**
     * @ORM\Column(type="boolean")
     */
    private $share_stock;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted;


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

    public function getShareCustomer(): ?bool
    {
        return $this->share_customer;
    }

    public function setShareCustomer(bool $share_customer): self
    {
        $this->share_customer = $share_customer;

        return $this;
    }

    public function getShareOrder(): ?bool
    {
        return $this->share_order;
    }

    public function setShareOrder(bool $share_order): self
    {
        $this->share_order = $share_order;

        return $this;
    }

    public function getShareStock(): ?bool
    {
        return $this->share_stock;
    }

    public function setShareStock(bool $share_stock): self
    {
        $this->share_stock = $share_stock;

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

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }
}
