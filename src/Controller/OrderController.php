<?php

namespace App\Controller;

use App\Entity\Order;
use App\Service\OrderManager;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\View as ViewAnnotation;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends FOSRestController
{
    /**
     * @Annotations\Get(
     *     path="/order/{order}",
     *     name = "get_order"
     * )
     *
     * @ParamConverter("order", class="App\Entity\Order", options={"repository_method" = "findOrderBy"})
     *
     * @param                                      Order $order
     * @ViewAnnotation(serializerGroups={"order"}, statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function getOrderAction(Order $order): View
    {
        return $this->view($order);
    }

    /**
     * @Annotations\Get(
     *     path="/orders",
     *     name = "get_order_collection"
     * )
     * @ViewAnnotation(serializerGroups={"order"}, statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function getOrderCollectionAction(): View
    {
        $orders = $this->getDoctrine()->getRepository(Order::class)->findAll();

        return $this->view($orders);
    }

    /**
     * @Annotations\Put(
     *     path="/order/{order}",
     *     name = "edit_order"
     * )
     *
     * @ParamConverter("order",                    class="App\Entity\Order", options={"repository_method" = "findOrderBy"})
     * @ViewAnnotation(serializerGroups={"order"}, statusCode=Response::HTTP_OK)
     *
     * @param Order $order
     *
     * @return View
     */
    public function editOrderAction(Order $order): View
    {
        return $this->view([]);
    }

    /**
     * @Annotations\Post(
     *     path="/order",
     *     name = "create_new_order"
     * )
     * @ParamConverter("order", converter="fos_rest.request_body", class="App\Model\Order")
     *
     * @param \App\Model\Order $order
     * @param OrderManager     $orderManager
     *
     * @return View
     */
    public function createNewOrderAction(\App\Model\Order $order, OrderManager $orderManager): View
    {
        $orderManager->createNewOrder($order);

        return $this->view($order);
    }
}
