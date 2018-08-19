<?php

namespace App\Controller;

use App\Entity\Address;
use App\Service\MyService;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use Symfony\Component\Serializer\SerializerInterface;


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
     * @return View
     */
    public function newAddressAction(SerializerInterface $serializer) : View
    {
        $ad = $serializer->deserialize('{"idAddress": 100}', Address::class, 'json');
        var_dump($ad);exit;
        return $this->view([] , Response::HTTP_OK);
    }
}
