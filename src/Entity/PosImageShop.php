<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosImageShop
 *
 * @ORM\Table(name="pos_image_shop", uniqueConstraints={@ORM\UniqueConstraint(name="id_product", columns={"id_product", "id_shop", "cover"})}, indexes={@ORM\Index(name="id_shop", columns={"id_shop"})})
 * @ORM\Entity
 */
class PosImageShop
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_image", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idImage;

    /**
     * @var int
     *
     * @ORM\Column(name="id_shop", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idShop;

    /**
     * @var int
     *
     * @ORM\Column(name="id_product", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idProduct;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="cover", type="boolean", nullable=true)
     */
    private $cover;

    public function getIdImage(): ?int
    {
        return $this->idImage;
    }

    public function setIdImage(int $idImage): self
    {
        $this->idImage = $idImage;

        return $this;
    }

    public function getIdShop(): ?int
    {
        return $this->idShop;
    }

    public function setIdShop(int $idShop): self
    {
        $this->idShop = $idShop;

        return $this;
    }

    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct): self
    {
        $this->idProduct = $idProduct;

        return $this;
    }

    public function getCover(): ?bool
    {
        return $this->cover;
    }

    public function setCover(?bool $cover): self
    {
        $this->cover = $cover;

        return $this;
    }


}
