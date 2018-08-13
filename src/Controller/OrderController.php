<?php

namespace App\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;

class OrderController extends FOSRestController
{
   /**
    * @Annotations\Get(
    *     path="/order",
    *     name = "order_list"
    * )
    */
    public function orderListAction() : View
    {
        return $this->view([], 200);
    }


}
