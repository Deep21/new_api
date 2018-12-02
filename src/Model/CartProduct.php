<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 04/11/18
 * Time: 19:11.
 */

namespace App\Model;

use JMS\Serializer\Annotation\Type;

class CartProduct
{
    /**
     * @Type("int")
     */
    public $id;

    /**
     * @Type("int")
     */
    public $quantity;

    /**
     * @Type("int")
     */
    public $product_attribute;

    /**
     * @Type("int")
     */
    public $product;

    /**
     * @Type("string")
     */
    public $product_name;

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getProductAttribute()
    {
        return $this->product_attribute;
    }

    /**
     * @param int $product_attribute
     */
    public function setProductAttribute(int $product_attribute): void
    {
        $this->product_attribute = $product_attribute;
    }

    /**
     * @return int
     */
    public function getProduct() : int
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product): void
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * @param mixed $product_name
     */
    public function setProductName($product_name): void
    {
        $this->product_name = $product_name;
    }
}
