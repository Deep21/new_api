<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosStockMvtReason
 *
 * @ORM\Table(name="pos_stock_mvt_reason")
 * @ORM\Entity
 */
class PosStockMvtReason
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_stock_mvt_reason", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idStockMvtReason;

    /**
     * @var bool
     *
     * @ORM\Column(name="sign", type="boolean", nullable=false, options={"default"="1"})
     */
    private $sign = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_add", type="datetime", nullable=false)
     */
    private $dateAdd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_upd", type="datetime", nullable=false)
     */
    private $dateUpd;

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=false)
     */
    private $deleted = '0';

    public function getIdStockMvtReason(): ?int
    {
        return $this->idStockMvtReason;
    }

    public function setIdStockMvtReason(int $idStockMvtReason): self
    {
        $this->idStockMvtReason = $idStockMvtReason;

        return $this;
    }

    public function getSign(): ?bool
    {
        return $this->sign;
    }

    public function setSign(bool $sign): self
    {
        $this->sign = $sign;

        return $this;
    }

    public function getDateAdd(): ?\DateTimeInterface
    {
        return $this->dateAdd;
    }

    public function setDateAdd(\DateTimeInterface $dateAdd): self
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    public function getDateUpd(): ?\DateTimeInterface
    {
        return $this->dateUpd;
    }

    public function setDateUpd(\DateTimeInterface $dateUpd): self
    {
        $this->dateUpd = $dateUpd;

        return $this;
    }

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }


}
