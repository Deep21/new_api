<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 13/08/18
 * Time: 17:14.
 */

namespace App\Service;

use App\Entity\Order;
use App\Repository\OrderDetailRepository;
use App\Repository\OrderRepository;

/**
 * Class OrderManager.
 */
class OrderManager extends AbstractOrderManager
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var OrderDetailRepository
     */
    private $orderDetail;

    /**
     * OrderManager constructor.
     *
     * @param OrderRepository       $orderRepository
     * @param OrderDetailRepository $orderDetail
     */
    public function __construct(OrderRepository $orderRepository, OrderDetailRepository $orderDetail)
    {
        parent::__construct($orderRepository);
        $this->orderRepository = $orderRepository;
        $this->orderDetail = $orderDetail;
    }

    /**
     * @param \App\Model\Order $order
     */
    public function onCreateNewOrder(\App\Model\Order $order)
    {
        $this->orderDetail->createOrderDetail($order);
    }

    /**
     * @param \App\Model\Order $order
     */
    public function onUpdateOrder(\App\Model\Order $order)
    {
        $this->orderRepository->updateOrder($order);
    }
}
