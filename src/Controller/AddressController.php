<?php

namespace App\Controller;

use App\Entity\Address;
use App\Service\MyService;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validation;


class AddressController extends FOSRestController
{
    /**
     * @Annotations\Get(
     *     path="/address",
     *     name = "get_address_collection"
     * )
     *
     * @return View
     */
    public function getAddressCollectionAction() : View
    {
        $repo = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Address::class);

        return $this->view($repo->findAll() , Response::HTTP_OK);
    }

    /**
     * @Annotations\Get(
     *     path="/address/{address}",
     *     name = "get_address"
     * )
     *
     * @ParamConverter("address", class="App\Entity\Address")
     * @param Address $address
     * @return View
     */
    public function getAddressAction(Address $address) : View
    {
        return $this->view($address , Response::HTTP_OK);
    }

    /**
     * @Annotations\Post(
     *     path="/address",
     *     name = "new_address"
     * )
     *
     * @param SerializerInterface $serializer
     * @param Request $request
     *
     * @return View(statusCode=Response::HTTP_CREATED)
     */
    public function newAddressAction(SerializerInterface $serializer, Request $request) : View
    {
        $json = $request->getContent();
        $address   = $serializer->deserialize($json, Address::class, 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($address);
        $em->flush();


        return $this->view([], Response::HTTP_CREATED);
    }

    /**
     * @Annotations\Delete(
     *     path="/address/{address}",
     *     name = "remove_address"
     * )
     *
     * @ParamConverter("address", class="App\Entity\Address")
     * @param Address $address
     * @return View(statusCode=Response::HTTP_NO_CONTENT)
     */
    public function removeAddressAction(Address $address) : View
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($address);
        $em->flush();

        return $this->view([], Response::HTTP_NO_CONTENT);
    }

    /**
     * @Annotations\Put(
     *     path="/address/{address}",
     *     name = "edit_address"
     * )
     *
     * @ParamConverter("address", class="App\Entity\Address")
     * @param Address $address
     * @return View(statusCode=Response::HTTP_NO_CONTENT)
     */
    public function editAddressAction(Address $address) : View
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($address);
        $em->flush();

        return $this->view([], Response::HTTP_NO_CONTENT);
    }
}
