<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosProductAttachment
 *
 * @ORM\Table(name="pos_product_attachment")
 * @ORM\Entity
 */
class PosProductAttachment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_product", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idProduct;

    /**
     * @var int
     *
     * @ORM\Column(name="id_attachment", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idAttachment;

    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct): self
    {
        $this->idProduct = $idProduct;

        return $this;
    }

    public function getIdAttachment(): ?int
    {
        return $this->idAttachment;
    }

    public function setIdAttachment(int $idAttachment): self
    {
        $this->idAttachment = $idAttachment;

        return $this;
    }


}
