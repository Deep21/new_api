<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvOrder
 *
 * @ORM\Table(name="inv_order")
 * @ORM\Entity
 */
class InvOrder
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=9, nullable=false)
     */
    private $reference;

    /**
     * @var int
     *
     * @ORM\Column(name="id_customer", type="integer", nullable=false)
     */
    private $idCustomer;

    /**
     * @var int
     *
     * @ORM\Column(name="id_cart", type="integer", nullable=false)
     */
    private $idCart;

    /**
     * @var int
     *
     * @ORM\Column(name="id_currency", type="integer", nullable=false)
     */
    private $idCurrency;

    /**
     * @var int
     *
     * @ORM\Column(name="id_address_delivery", type="integer", nullable=false)
     */
    private $idAddressDelivery;

    /**
     * @var int
     *
     * @ORM\Column(name="id_address_invoice", type="integer", nullable=false)
     */
    private $idAddressInvoice;

    /**
     * @var int
     *
     * @ORM\Column(name="invoice_number", type="integer", nullable=false)
     */
    private $invoiceNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="total_discounts", type="decimal", precision=20, scale=0, nullable=true)
     */
    private $totalDiscounts;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;


}
