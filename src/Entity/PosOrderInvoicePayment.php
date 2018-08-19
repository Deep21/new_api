<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosOrderInvoicePayment
 *
 * @ORM\Table(name="pos_order_invoice_payment", indexes={@ORM\Index(name="order_payment", columns={"id_order_payment"}), @ORM\Index(name="id_order", columns={"id_order"})})
 * @ORM\Entity
 */
class PosOrderInvoicePayment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_order_invoice", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idOrderInvoice;

    /**
     * @var int
     *
     * @ORM\Column(name="id_order_payment", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idOrderPayment;

    /**
     * @var int
     *
     * @ORM\Column(name="id_order", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idOrder;

    public function getIdOrderInvoice(): ?int
    {
        return $this->idOrderInvoice;
    }

    public function setIdOrderInvoice(int $idOrderInvoice): self
    {
        $this->idOrderInvoice = $idOrderInvoice;

        return $this;
    }

    public function getIdOrderPayment(): ?int
    {
        return $this->idOrderPayment;
    }

    public function setIdOrderPayment(int $idOrderPayment): self
    {
        $this->idOrderPayment = $idOrderPayment;

        return $this;
    }

    public function getIdOrder(): ?int
    {
        return $this->idOrder;
    }

    public function setIdOrder(int $idOrder): self
    {
        $this->idOrder = $idOrder;

        return $this;
    }


}
