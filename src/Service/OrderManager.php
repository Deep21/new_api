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
     * @var CartRepository
     */
    private $cartRepository;
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * OrderManager constructor.
     * @param EventDispatcherInterface $eventDispatcher
     * @param OrderRepository $orderRepository
     * @param OrderDetailRepository $detailRepository
     * @param CartRepository $cartRepository
     * @param CustomerRepository $customerRepository
     */
    public function __construct(EventDispatcherInterface $eventDispatcher,
                                OrderRepository $orderRepository,
                                OrderDetailRepository $detailRepository,
                                CartRepository $cartRepository,
                                CustomerRepository $customerRepository
    )
    {
        $this->eventDispatcher  = $eventDispatcher;
        $this->orderRepository  = $orderRepository;
        $this->detailRepository = $detailRepository;
        $this->cartRepository   = $cartRepository;
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param \App\Model\Order $orderModel
     */
    public function placeOrder(\App\Model\Order $orderModel)
    {
/*        $productsCart     = $orderModel->getCart()->getCartProduct();
        $cart             = $this->cartRepository->findOneBy(['id' => $orderModel->getCart()->getId()]);
        $customer         = $this->customerRepository->findOneBy(['id' => $orderModel->getCustomer()->getId()]);*/
        try {
//            $order = $this->orderRepository->createOrder($cart, $customer);
//            $this->detailRepository->insertOrderDetail($productsCart, $order);
            $this->detailRepository->t();

        } catch (ORMException $e) {
        }
    }

    public function testOrderMerge()
    {
    }

}
