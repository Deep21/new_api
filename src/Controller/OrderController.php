<?php

namespace App\Controller;

use App\Entity\InvOrder;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends FOSRestController
{
   /**
    * @Annotations\Get(
    *     path="/orders",
    *     name = "order_list"
    * )
    * @return View
    */
    public function orderListAction() : View
    {
        $orders = $this->getDoctrine()->getRepository(InvOrder::class)->findAll();

        return $this->view($orders, Response::HTTP_OK);
    }

    /**
     * @Annotations\Get(
     *     path="/order/{id}",
     *     name = "order"
     * )
     * @ParamConverter("invorder", class="App\Entity\InvOrder")
     * @param InvOrder $invOrder
     * @return View
     */
    public function orderAction(InvOrder $invOrder) : View
    {
        return $this->view($invOrder, Response::HTTP_OK);

    }


}
