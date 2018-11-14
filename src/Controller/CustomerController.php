<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Customer;
use App\Service\AddressManager;
use App\Service\CustomerManager;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\View as ViewAnnotation;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class CustomerController extends FOSRestController
{
    /**
     * @Annotations\Get(
     *     path="/customer/{customer}",
     *     name = "get_customer"
     * )
     * @Entity("customer", expr="repository.getCustomerById(customer)", class="App\Entity\Customer")
     * @param                                     Customer $customer
     * @ViewAnnotation(serializerGroups={"list"}, statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function getCustomerAction(Customer $customer): View
    {
        return $this->view($customer);
    }

    /**
     * @Annotations\Get(
     *     path="/customers",
     *     name = "get_customer_collection"
     * )
     * @ViewAnnotation(statusCode=Response::HTTP_OK)
     * @IsGranted("ROLE_USER")
     * @return View
     */
    public function getCustomerCollectionAction(): View
    {
        //        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $customers = $this
            ->getDoctrine()
            ->getRepository(Customer::class)
            ->getCustomerCollection();

        return $this->view($customers);
    }

    /**
     * @Annotations\Get(
     *     path="/customer/{customer}/address",
     *     name = "get_customer_address"
     * )
     * @param                                     AddressManager $addressManager
     * @param                                     Request        $request
     * @ViewAnnotation(serializerGroups={"list"}, statusCode=Response::HTTP_OK)
     * @return View
     */
    public function getCustomerAddressAction(AddressManager $addressManager, Request $request): View
    {
        $address = $addressManager
            ->getAddressByClient($request->get('customer'));

        return $this->view($address);
    }

    /**
     * @Annotations\Put(
     *     path="/customer",
     *     name = "edit_customer"
     * )
     *
     * @param ConstraintViolationListInterface $validationErrors
     * @param Customer                         $customer
     * @param CustomerManager                  $manager
     *
     * @return                                    View
     * @ParamConverter("customer",                converter="fos_rest.request_body", class="App\Entity\Customer")
     * @ViewAnnotation(serializerGroups={"list"}, statusCode=Response::HTTP_ACCEPTED)
     */
    public function editCustomerAction(ConstraintViolationListInterface $validationErrors, Customer $customer, CustomerManager $manager): View
    {
        if (count($validationErrors) > 0) {
            return $this->view($validationErrors);
        }

        if ($manager->isCustomerExist($customer->getId()) > 0) {
            $this
                ->getDoctrine()
                ->getRepository('App:Customer')
                ->updateCustomer($customer);
        }

        return $this->view($customer);
    }

    /**
     * @Annotations\Post(
     *     path="/customer",
     *     name = "add_new_customer"
     * )
     *
     * @param                                     Customer                         $customer
     * @param                                     ConstraintViolationListInterface $validationErrors
     * @ParamConverter("customer",                converter="fos_rest.request_body", class="App\Entity\Customer")
     * @ViewAnnotation(serializerGroups={"list"}, statusCode=Response::HTTP_CREATED)
     *
     * @return View
     */
    public function addCustomerAction(ConstraintViolationListInterface $validationErrors, Customer $customer): View
    {
        $em = $this->getDoctrine()->getManager();

        $customer->setIsActive(1);
        $customer->setIsDeleted(0);
        $em->persist($customer);

        $em->flush();

        return $this->view($customer);
    }

    /**
     * @Annotations\Post(
     *     path="/customer/{customer}/address",
     *     name = "add_new_address_to_customer"
     * )
     *
     * @param ConstraintViolationListInterface $validationErrors
     * @param Address                          $address
     * @param Customer                         $customer
     *
     * @return                                            View
     * @ParamConverter("address",                         converter="fos_rest.request_body", class="App\Entity\Address")
     * @ParamConverter("customer",                        class="App\Entity\Customer", options={"repository_method" = "getCustomerById"})
     * @ViewAnnotation(statusCode=Response::HTTP_CREATED)
     */
    public function addAddressToCustomerAction(ConstraintViolationListInterface $validationErrors, Address $address, Customer $customer): View
    {
        $em = $this->getDoctrine()->getManager();
        $address->setCustomer($customer);
        $em->persist($address);
        $em->flush();

        return $this->view($address);
    }

    /**
     * @Annotations\Delete(
     *     path="/customer/{customer}",
     *     name = "remove_customer"
     * )
     * @ViewAnnotation(serializerGroups={"list"}, statusCode=Response::HTTP_NO_CONTENT)
     * @Entity("customer", expr="repository.getCustomerById(customer)", class="App\Entity\Customer")
     * @param Customer $customer
     * @return View
     */
    public function removeCustomerAction(Customer $customer): View
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($customer);
        $em->flush();

        $this->view($customer->getId());
    }
}
