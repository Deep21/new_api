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
}
