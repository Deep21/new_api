<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosOrderState
 *
 * @ORM\Table(name="pos_order_state", indexes={@ORM\Index(name="module_name", columns={"module_name"})})
 * @ORM\Entity
 */
class PosOrderState
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_order_state", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idOrderState;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="invoice", type="boolean", nullable=true)
     */
    private $invoice = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="send_email", type="boolean", nullable=false)
     */
    private $sendEmail = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="module_name", type="string", length=255, nullable=true)
     */
    private $moduleName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="color", type="string", length=32, nullable=true)
     */
    private $color;

    /**
     * @var bool
     *
     * @ORM\Column(name="unremovable", type="boolean", nullable=false)
     */
    private $unremovable;

    /**
     * @var bool
     *
     * @ORM\Column(name="hidden", type="boolean", nullable=false)
     */
    private $hidden = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="logable", type="boolean", nullable=false)
     */
    private $logable = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="delivery", type="boolean", nullable=false)
     */
    private $delivery = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="shipped", type="boolean", nullable=false)
     */
    private $shipped = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="paid", type="boolean", nullable=false)
     */
    private $paid = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="pdf_invoice", type="boolean", nullable=false)
     */
    private $pdfInvoice = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="pdf_delivery", type="boolean", nullable=false)
     */
    private $pdfDelivery = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=false)
     */
    private $deleted = '0';

    public function getIdOrderState(): ?int
    {
        return $this->idOrderState;
    }

    public function setIdOrderState(int $idOrderState): self
    {
        $this->idOrderState = $idOrderState;

        return $this;
    }

    public function getInvoice(): ?bool
    {
        return $this->invoice;
    }

    public function setInvoice(?bool $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getSendEmail(): ?bool
    {
        return $this->sendEmail;
    }

    public function setSendEmail(bool $sendEmail): self
    {
        $this->sendEmail = $sendEmail;

        return $this;
    }

    public function getModuleName(): ?string
    {
        return $this->moduleName;
    }

    public function setModuleName(?string $moduleName): self
    {
        $this->moduleName = $moduleName;

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

    public function getUnremovable(): ?bool
    {
        return $this->unremovable;
    }

    public function setUnremovable(bool $unremovable): self
    {
        $this->unremovable = $unremovable;

        return $this;
    }

    public function getHidden(): ?bool
    {
        return $this->hidden;
    }

    public function setHidden(bool $hidden): self
    {
        $this->hidden = $hidden;

        return $this;
    }

    public function getLogable(): ?bool
    {
        return $this->logable;
    }

    public function setLogable(bool $logable): self
    {
        $this->logable = $logable;

        return $this;
    }

    public function getDelivery(): ?bool
    {
        return $this->delivery;
    }

    public function setDelivery(bool $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }

    public function getShipped(): ?bool
    {
        return $this->shipped;
    }

    public function setShipped(bool $shipped): self
    {
        $this->shipped = $shipped;

        return $this;
    }

    public function getPaid(): ?bool
    {
        return $this->paid;
    }

    public function setPaid(bool $paid): self
    {
        $this->paid = $paid;

        return $this;
    }

    public function getPdfInvoice(): ?bool
    {
        return $this->pdfInvoice;
    }

    public function setPdfInvoice(bool $pdfInvoice): self
    {
        $this->pdfInvoice = $pdfInvoice;

        return $this;
    }

    public function getPdfDelivery(): ?bool
    {
        return $this->pdfDelivery;
    }

    public function setPdfDelivery(bool $pdfDelivery): self
    {
        $this->pdfDelivery = $pdfDelivery;

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
