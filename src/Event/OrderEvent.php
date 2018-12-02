<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 25/10/18
 * Time: 23:38.
 */

namespace App\Event;

use App\Model\Order;
use Symfony\Component\EventDispatcher\Event;

class OrderEvent extends Event
{
    /**
     * For the event naming conventions, see:
     * https://symfony.com/doc/current/components/event_dispatcher.html#naming-conventions.
     *
     * @Event("Symfony\Component\EventDispatcher\GenericEvent")
     *
     * @var string
     */
    const ORDER_INSERT = 'order.on_insert';
    const ORDER_ON_UPDATE = 'order.on_update';
    const DETAIL_ORDER_INSERT = 'order.on_insert';

    /**
     * @var Order
     */
    private $order;

    /**
     * OrderEvent constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @param Order $order
     */
    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }
}
