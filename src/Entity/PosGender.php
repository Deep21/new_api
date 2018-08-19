<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosGender
 *
 * @ORM\Table(name="pos_gender")
 * @ORM\Entity
 */
class PosGender
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_gender", type="integer", nullable=false)
     */
    private $idGender;

    /**
     * @var bool
     *
     * @ORM\Column(name="type", type="boolean", nullable=false)
     */
    private $type;

    public function getIdGender(): ?int
    {
        return $this->idGender;
    }

    public function setIdGender(int $idGender): self
    {
        $this->idGender = $idGender;

        return $this;
    }

    public function getType(): ?bool
    {
        return $this->type;
    }

    public function setType(bool $type): self
    {
        $this->type = $type;

        return $this;
    }


}
