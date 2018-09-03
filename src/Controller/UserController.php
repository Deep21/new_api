<?php

namespace App\Controller;

use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\View as ViewAnnotation;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController.
 *
 * @Annotations\Route("user")
 */
class UserController extends AbstractController
{
    /**
     * @Annotations\Get(
     *     path="/login",
     *     name = "user_login"
     * )
     * @ViewAnnotation(statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function loginAction(): View
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
