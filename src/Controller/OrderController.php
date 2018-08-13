<?php

namespace App\Controller;

use App\Entity\Order;
use App\Service\MyService;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use Psr\Log\LoggerInterface;

class OrderController extends FOSRestController
{
   /**
    * @Annotations\Get(
    *     path="/order",
    *     name = "order_list"
    * )
    * @return View
    */
    public function orderListAction(MyService $myService) : View
    {
        var_dump($myService->getName());exit;
        $orders = $this->getDoctrine()->getRepository(Order::class)->findAll();

        return $this->view($orders, 200);
    }


}
