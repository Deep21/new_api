<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosProductAttributeImage
 *
 * @ORM\Table(name="pos_product_attribute_image", indexes={@ORM\Index(name="id_image", columns={"id_image"})})
 * @ORM\Entity
 */
class PosProductAttributeImage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_product_attribute", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idProductAttribute;

    /**
     * @var int
     *
     * @ORM\Column(name="id_image", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idImage;

    public function getIdProductAttribute(): ?int
    {
        return $this->idProductAttribute;
    }

    public function setIdProductAttribute(int $idProductAttribute): self
    {
        $this->idProductAttribute = $idProductAttribute;

        return $this;
    }

    public function getIdImage(): ?int
    {
        return $this->idImage;
    }

    public function setIdImage(int $idImage): self
    {
        $this->idImage = $idImage;

        return $this;
    }


}
