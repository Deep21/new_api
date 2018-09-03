<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 04/11/18
 * Time: 18:46.
 */

namespace App\Model;

use JMS\Serializer\Annotation\Type;

class Order
{
    /**
     * @var int
     */
    public $id;

    /**
     * @Type("App\Model\Cart")
     */
    public $cart;

    /**
     * @Type("App\Model\Customer")
     */
    public $customer;

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return int
     */
    public function getId(): int
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
     * @return Cart
     */
    public function getCart() : Cart
    {
        return $this->cart;
    }

    /**
     * @param Cart $cart
     */
    public function setCart(Cart $cart): void
    {
        $this->cart = $cart;
    }
}
