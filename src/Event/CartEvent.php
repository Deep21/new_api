<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 25/10/18
 * Time: 23:38.
 */

namespace App\Event;

use App\Entity\CartProduct;
use Symfony\Component\EventDispatcher\Event;

class CartEvent extends Event
{
    /**
     * For the event naming conventions, see:
     * https://symfony.com/doc/current/components/event_dispatcher.html#naming-conventions.
     *
     * @Event("Symfony\Component\EventDispatcher\GenericEvent")
     *
     * @var string
     */
    const CART_DECREASE = 'cart.decrease';
    const CART_UPDATE = 'cart.onupdate';
    const CART_INCREASE = 'cart.increase';

    /**
     * @var CartProduct
     */
    private $cartProduct;

    /**
     * @var string
     */
    private $msg;

    /**
     * CartEvent constructor.
     *
     * @param CartProduct $cartProduct
     */
    public function __construct(CartProduct $cartProduct)
    {
        $this->cartProduct = $cartProduct;
    }

    /**
     * @return CartProduct
     */
    public function getCart(): CartProduct
    {
        return $this->cartProduct;
    }

    public function setMsg(string $msg)
    {
        $this->msg = $msg;
    }

    /**
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }
}
