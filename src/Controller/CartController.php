<?php

namespace App\Controller;

use App\Entity\InvCart;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

class CartController extends FOSRestController
{
    /**
     * @Annotations\Get(
     *     path="/cart/{id}",
     *     name = "cart_single"
     * )
     * @ParamConverter("invcart", class="App\Entity\InvCart")
     * @param InvCart $cart
     * @return View
     */
    public function cartAction(InvCart $cart) : View
    {
        return $this->view($cart, Response::HTTP_OK);
    }

    /**
     * @Annotations\Get(
     *     path="/carts",
     *     name = "cart_list"
     * )
     * @return View
     */
    public function getListCartAction() : View
    {
        $carts = $this->getDoctrine()->getRepository(InvCart::class)->findAll();

        return $this->view($carts, Response::HTTP_OK);
    }

    /**
     * @Annotations\Delete(
     *     path="/cart/{id}",
     *     name = "cart_delete"
     * )
     * @ParamConverter("invcart", class="App\Entity\InvCart")
     * @param InvCart $invCart
     * @return View
     */
    public function removeCartAction(InvCart $invCart) : View
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($invCart);
        $em->flush();

        return $this->view([], Response::HTTP_OK);
    }





}
