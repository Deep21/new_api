<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosOrderReturnStateLang
 *
 * @ORM\Table(name="pos_order_return_state_lang")
 * @ORM\Entity
 */
class PosOrderReturnStateLang
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_order_return_state", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idOrderReturnState;

    /**
     * @var int
     *
     * @ORM\Column(name="id_lang", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idLang;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    public function getIdOrderReturnState(): ?int
    {
        return $this->idOrderReturnState;
    }

    public function setIdOrderReturnState(int $idOrderReturnState): self
    {
        $this->idOrderReturnState = $idOrderReturnState;

        return $this;
    }

    public function getIdLang(): ?int
    {
        return $this->idLang;
    }

    public function setIdLang(int $idLang): self
    {
        $this->idLang = $idLang;

        return $this;
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


}
