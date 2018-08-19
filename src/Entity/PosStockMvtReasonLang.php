<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosStockMvtReasonLang
 *
 * @ORM\Table(name="pos_stock_mvt_reason_lang")
 * @ORM\Entity
 */
class PosStockMvtReasonLang
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_stock_mvt_reason", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idStockMvtReason;

    /**
     * @var int
     *
     * @ORM\Column(name="id_lang", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idLang;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    public function getIdStockMvtReason(): ?int
    {
        return $this->idStockMvtReason;
    }

    public function setIdStockMvtReason(int $idStockMvtReason): self
    {
        $this->idStockMvtReason = $idStockMvtReason;

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
