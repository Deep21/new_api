<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Service\CustomerManager;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations;


class CustomerController extends FOSRestController
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
        return $this->view($customer);
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
        $customers = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Customer::class)
            ->findAll();

        $this->view($customers, Response::HTTP_OK);
    }

    /**
     * @Annotations\Get(
     *     path="/customer/{customer}/address",
     *     name = "get_customer_address"
     * )
     *
     * @param CustomerManager $customerManager
     * @return View
     */
    public function getCustomerAddressAction(CustomerManager $customerManager) : View
    {
        $customerManager->getAddress();
        $this->view([], Response::HTTP_OK);
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
