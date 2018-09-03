<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ManufacturerShop.
 *
 * @ORM\Entity(repositoryClass="App\Repository\ManufacturerShopRepository")
 */
class ManufacturerShop
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_shop;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdShop(): ?int
    {
        return $this->id_shop;
    }

    public function setIdShop(?int $id_shop): self
    {
        $this->id_shop = $id_shop;

        return $this;
    }
}
