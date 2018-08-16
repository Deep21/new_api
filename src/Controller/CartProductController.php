<?php

namespace App\Controller;

use App\Entity\InvCart;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

class CartProductController extends FOSRestController
{
    /**
     * @Annotations\Get(
     *     path="/cart/{id}",
     *     name = "cart_product_single"
     * )
     * @ParamConverter("invcartproduct", class="App\Entity\InvCartProduct")
     * @param InvCart $cart
     * @return View
     */
    public function index()
    {
        return $this->render('cart_product/index.html.twig', [
            'controller_name' => 'CartProductController',
        ]);
    }
}
