<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 25/10/18
 * Time: 22:38.
 */

namespace App\Listener;

use App\Event\CartEvent;
use App\Event\OrderEvent;
use App\Repository\CartProductRepository;
use App\Repository\OrderDetailRepository;
use App\Repository\OrderRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class OrderListener implements EventSubscriberInterface
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var OrderDetailRepository
     */
    private $detailRepository;

    /**
     * CartListener constructor.
     *
     * @param OrderRepository $orderRepository
     * @param OrderDetailRepository $detailRepository
     */
    public function __construct(OrderRepository $orderRepository, OrderDetailRepository $detailRepository)
    {
        $this->orderRepository  = $orderRepository;
        $this->detailRepository = $detailRepository;
    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return string[]
     */
    public static function getSubscribedEvents(): array
    {
        return [
            OrderEvent::ORDER_INSERT => [['onOrderInsert'],['onOrderUpdate']]
        ];
    }

    public function onOrderInsert(OrderEvent $event)
    {
        $event->getOrder()->getCart()->setId(800);
    }

    public function onOrderUpdate(OrderEvent $event)
    {
        echo __CLASS__;
    }
}
