<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosOrderReturnDetail
 *
 * @ORM\Table(name="pos_order_return_detail")
 * @ORM\Entity
 */
class PosOrderReturnDetail
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_order_return", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idOrderReturn;

    /**
     * @var int
     *
     * @ORM\Column(name="id_order_detail", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idOrderDetail;

    /**
     * @var int
     *
     * @ORM\Column(name="id_customization", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idCustomization = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="product_quantity", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $productQuantity = '0';

    public function getIdOrderReturn(): ?int
    {
        return $this->idOrderReturn;
    }

    public function setIdOrderReturn(int $idOrderReturn): self
    {
        $this->idOrderReturn = $idOrderReturn;

        return $this;
    }

    public function getIdOrderDetail(): ?int
    {
        return $this->idOrderDetail;
    }

    public function setIdOrderDetail(int $idOrderDetail): self
    {
        $this->idOrderDetail = $idOrderDetail;

        return $this;
    }

    public function getIdCustomization(): ?int
    {
        return $this->idCustomization;
    }

    public function setIdCustomization(int $idCustomization): self
    {
        $this->idCustomization = $idCustomization;

        return $this;
    }

    public function getProductQuantity(): ?int
    {
        return $this->productQuantity;
    }

    public function setProductQuantity(int $productQuantity): self
    {
        $this->productQuantity = $productQuantity;

        return $this;
    }


}
