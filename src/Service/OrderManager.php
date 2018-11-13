<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 13/08/18
 * Time: 17:14.
 */

namespace App\Service;

use App\Entity\Customer;
use App\Repository\CartRepository;
use App\Repository\CustomerRepository;
use App\Repository\OrderDetailRepository;
use App\Repository\OrderRepository;
use Doctrine\ORM\ORMException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class OrderManager.
 */
class OrderManager
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var OrderDetailRepository
     */
    private $detailRepository;

    /**
     * OrderManager constructor.
     * @param EventDispatcherInterface $eventDispatcher
     * @param OrderRepository $orderRepository
     * @param OrderDetailRepository $detailRepository
     */
    public function __construct(EventDispatcherInterface $eventDispatcher,
                                OrderRepository $orderRepository,
                                OrderDetailRepository $detailRepository
    )
    {
        $this->eventDispatcher  = $eventDispatcher;
        $this->orderRepository  = $orderRepository;
        $this->detailRepository = $detailRepository;
    }

    /**
     * @param \App\Model\Order $orderModel
     */
    public function placeOrder(\App\Model\Order $orderModel)
    {
        $productsCart     = $orderModel->getCart()->getCartProduct();

        try {
            $order = $this->orderRepository->createOrder($orderModel);
            $this->detailRepository->insertOrderDetail($productsCart, $order);

        } catch (ORMException $e) {
            dd($e->getMessage());
        }
    }

    public function testOrderMerge()
    {
    }

}
