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
     * @return array
     */
    public function getCartProduct() : array
    {
        return $this->cart_product;
    }

}
