<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosImage
 *
 * @ORM\Table(name="pos_image", uniqueConstraints={@ORM\UniqueConstraint(name="id_product_cover", columns={"id_product", "cover"}), @ORM\UniqueConstraint(name="idx_product_image", columns={"id_image", "id_product", "cover"})}, indexes={@ORM\Index(name="image_product", columns={"id_product"})})
 * @ORM\Entity
 */
class PosImage
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
     * @ORM\Column(name="id_product", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idProduct;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $position = '0';

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

    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct): self
    {
        $this->idProduct = $idProduct;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

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
