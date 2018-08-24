<?php

namespace App\Controller;


use App\Entity\Order;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends FOSRestController
{
    /**
     * @Annotations\Get(
     *     path="/order/{order}",
     *     name = "get_order"
     * )
     *
     * @ParamConverter("order", class="App\Entity\Orders")
     * @param Order $order
     * @return View
     */
    public function getOrderAction(Order $order) : View
    {

    }

    /**
     * @Annotations\Put(
     *     path="/order/{order}",
     *     name = "edit_order"
     * )
     *
     * @ParamConverter("order", class="App\Entity\Orders")
     * @param Orders $order
     * @return View
     */
    public function editOrderAction(Order $order) : View
    {

    }

    /**
     * @Annotations\Post(
     *     path="/order",
     *     name = "nzw_order"
     * )
     *
     * @ParamConverter("order", class="App\Entity\Orders")
     * @return View
     */
    public function newOrderAction() : View
    {

    }

}
