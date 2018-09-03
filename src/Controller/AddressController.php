<?php

namespace App\Controller;

use App\Entity\Address;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\View as ViewAnnotation;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class AddressController extends FOSRestController
{
    /**
     * @Annotations\Get(
     *     path="/address",
     *     name = "get_address_collection"
     * )
     * @ViewAnnotation(serializerGroups={"address_list_view"}, statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function getAddressCollectionAction(): View
    {
        $repo = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Address::class);

        return $this->view($repo->findAll());
    }

    /**
     * @Annotations\Get(
     *     path="/address/{address}",
     *     name = "get_address"
     * )
     * @ParamConverter("address", class="App\Entity\Address", options={"repository_method" = "findById"})
     *
     * @param                                                  Address $address
     * @ViewAnnotation(serializerGroups={"address_list_view"}, statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function getAddressAction(Address $address): View
    {
        return $this->view($address);
    }

    /**
     * @Annotations\Post(
     *     path="/address",
     *     name = "new_address"
     * )
     *
     * @param                     ConstraintViolationListInterface $validationErrors
     * @ParamConverter("address", converter="fos_rest.request_body", class="App\Entity\Address")
     *
     * @param                                                  Address                          $address
     * @ViewAnnotation(serializerGroups={"address_list_view"}, statusCode=Response::HTTP_CREATED)
     *
     * @return View()
     */
    public function newAddressAction(ConstraintViolationListInterface $validationErrors, Address $address): View
    {
        if (count($validationErrors) > 0) {
            return $this->view([], Response::HTTP_BAD_REQUEST);
        }

        try {
            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();
        } catch (NoResultException $e) {
            throw new NotFoundHttpException('Not Found');
        } catch (NonUniqueResultException $e) {
        }

        return $this->view($address);
    }

    /**
     * @Annotations\Delete(
     *     path="/address/{address}",
     *     name = "remove_address"
     * )
     *
     * @param                     Address $address
     * @ParamConverter("address", class="App\Entity\Address", options={"repository_method" = "findById"})
     *
     * @return View(statusCode=Response::HTTP_NO_CONTENT)
     */
    public function removeAddressAction(Address $address): View
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($address);
        $em->flush();

        return $this->view([]);
    }

    /**
     * @Annotations\Put(
     *     path="/address/{address}",
     *     name = "edit_address"
     * )
     *
     * @ParamConverter("address", class="App\Entity\Address", options={"repository_method" = "findById"})
     *
     * @param                                                  Address $address
     * @ViewAnnotation(serializerGroups={"address_list_view"}, statusCode=Response::HTTP_ACCEPTED)
     *
     * @return View()
     */
    public function editAddressAction(Address $address): View
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($address);
        $em->flush();

        return $this->view([]);
    }
}
