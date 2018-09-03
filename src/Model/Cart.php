<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 04/11/18
 * Time: 19:11.
 */

namespace App\Model;

use JMS\Serializer\Annotation\Type;

class Cart
{
    /**
     * @Type("int")
     */
    public $id;

    /**
     * @Type("array<App\Model\CartProduct>")
     */
    public $cart_product;

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
     * @return CartProduct
     */
    public function getCartProduct() : CartProduct
    {
        return $this->cart_product;
    }

    /**
     * @param CartProduct $cart_product
     */
    public function setCartProduct(CartProduct $cart_product): void
    {
        $this->cart_product = $cart_product;
    }
}
