<?php

namespace App\Controller;

use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\View as ViewAnnotation;
use FOS\RestBundle\View\View;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\PasswordGrant;
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
     * @var AuthorizationServer
     */
    private $authorizationServer;
    /**
     * @var PasswordGrant
     */
    private $grant;

    /**
     * UserController constructor.
     * @param AuthorizationServer $authorizationServer
     * @param PasswordGrant $grant
     */
    public function __construct(AuthorizationServer $authorizationServer, PasswordGrant $grant)
    {
        $this->authorizationServer = $authorizationServer;
        $this->grant = $grant;
    }

    /**
     * @Annotations\Get(
     *     path="/register",
     *     name = "user_register"
     * )
     * @ViewAnnotation(statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function registerAction(): View
    {

    }
}
