<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 13/08/18
 * Time: 17:14
 */

namespace App\Service;


use App\Repository\AddressRepository;
use App\Repository\CustomerRepository;
use App\Repository\OrderRepository;

class CustomerManager
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * CustomerManager constructor.
     * @param CustomerRepository $customerRepository
     * @param OrderRepository $orderRepository
     */
    public function __construct(CustomerRepository $customerRepository, OrderRepository $orderRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->orderRepository = $orderRepository;
    }

    public function getCustomerDetails()
    {
        return $this->customerRepository->findAll();
    }

    public function getAddress()
    {
    }
}