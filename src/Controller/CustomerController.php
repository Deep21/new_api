<?php

namespace App\Controller;

use App\Entity\Customer;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class CustomerController extends AbstractController
{
    /**
     * @Annotations\Get(
     *     path="/customer/{customer}",
     *     name = "get_customer"
     * )
     *
     * @ParamConverter("customer", class="App\Entity\Customer")
     * @param Customer $customer
     * @return View
     */
    public function getCustomerAction(Customer $customer) : View
    {

    }

    /**
     * @Annotations\Get(
     *     path="/customers",
     *     name = "get_customer_collection"
     * )
     *
     * @return View
     */
    public function getCustomerCollectionAction() : View
    {

    }

    /**
     * @Annotations\Get(
     *     path="/customer/{customer}/address",
     *     name = "get_customer_address"
     * )
     *
     * @return View
     */
    public function getCustomerAddressAction() : View
    {

    }

    /**
     * @Annotations\Put(
     *     path="/customer/{customer}/address",
     *     name = "edit_customer_address"
     * )
     * @ParamConverter("address", class="App\Entity\Customer")
     * @param Customer $customer
     * @return View
     */
    public function editCustomerAction(Customer $customer) : View
    {

    }

    /**
     * @Annotations\Post(
     *     path="/customer",
     *     name = "new_customer"
     * )
     *
     * @return View
     */
    public function addCustomerAction() : View
    {

    }

    /**
     * @Annotations\Delete(
     *     path="/customer/{customer}",
     *     name = "remove_customer"
     * )
     *
     * @return View
     */
    public function removeCustomerAction() : View
    {

    }
}
