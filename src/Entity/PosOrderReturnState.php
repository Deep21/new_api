<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosOrderReturnState
 *
 * @ORM\Table(name="pos_order_return_state")
 * @ORM\Entity
 */
class PosOrderReturnState
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_order_return_state", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idOrderReturnState;

    /**
     * @var string|null
     *
     * @ORM\Column(name="color", type="string", length=32, nullable=true)
     */
    private $color;

    public function getIdOrderReturnState(): ?int
    {
        return $this->idOrderReturnState;
    }

    public function setIdOrderReturnState(int $idOrderReturnState): self
    {
        $this->idOrderReturnState = $idOrderReturnState;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }


}
