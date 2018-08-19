<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosCartCartRule
 *
 * @ORM\Table(name="pos_cart_cart_rule", indexes={@ORM\Index(name="id_cart_rule", columns={"id_cart_rule"})})
 * @ORM\Entity
 */
class PosCartCartRule
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cart", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idCart;

    /**
     * @var int
     *
     * @ORM\Column(name="id_cart_rule", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idCartRule;

    public function getIdCart(): ?int
    {
        return $this->idCart;
    }

    public function setIdCart(int $idCart): self
    {
        $this->idCart = $idCart;

        return $this;
    }

    public function getIdCartRule(): ?int
    {
        return $this->idCartRule;
    }

    public function setIdCartRule(int $idCartRule): self
    {
        $this->idCartRule = $idCartRule;

        return $this;
    }


}
