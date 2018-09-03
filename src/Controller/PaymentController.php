<?php

namespace App\Controller;

use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\View as ViewAnnotation;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PaymentController.
 */
class PaymentController extends AbstractController
{
    /**
     * @Annotations\Post(
     *     path="/payment",
     *     name = "pay"
     * )
     * @ViewAnnotation(statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function payAction(): View
    {
        die('f');
    }

    /**
     * @Annotations\Get(
     *     path="/user/register",
     *     name = "user_register"
     * )
     * @ViewAnnotation(statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function registerAction(): View
    {
        die('f');
    }
}
