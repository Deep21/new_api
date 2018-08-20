<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 13/08/18
 * Time: 17:14
 */

namespace App\Service;


use App\Repository\AddressRepository;

class OrderManager
{
    /**
     * @var AddressRepository
     */
    private $addressRepository;

    /**
     * CustomerManager constructor.
     * @param AddressRepository $addressRepository
     */
    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function getName()
    {
        return $this->addressRepository->findAll();
    }
}