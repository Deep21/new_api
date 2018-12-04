<?php

namespace App\Controller;

use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\PasswordGrant;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @var AuthorizationServer
     */
    private $authorizationServer;
    /**
     * @var PasswordGrant
     */
    private $passwordGrant;

    /**
     * TestController constructor.
     * @param AuthorizationServer $authorizationServer
     * @param PasswordGrant $passwordGrant
     */
    public function __construct(
        AuthorizationServer $authorizationServer,
        PasswordGrant $passwordGrant
    ) {
        $this->authorizationServer = $authorizationServer;
        $this->passwordGrant = $passwordGrant;
    }

    /**
     * @Route("access-token", name="api_get_access_token", methods={"POST"})
     * @param ServerRequestInterface $request
     * @return Response
     * @throws \Exception
     */
    public function getAccessToken(ServerRequestInterface $request): Response
    {
        $response =  new \Zend\Diactoros\Response();

        $this->passwordGrant->setRefreshTokenTTL(new \DateInterval('P1M'));
        $this->authorizationServer->enableGrantType(
            $this->passwordGrant,
            new \DateInterval('P1M')
        );

        $responseInterface = $this->authorizationServer->respondToAccessTokenRequest($request, $response);
        $httpFoundationFactory = new HttpFoundationFactory();

        // convert a Response
        // $psrResponse is an instance of Psr\Http\Message\ResponseInterface
        return $httpFoundationFactory->createResponse($responseInterface);
    }

    /**
     * @Route("login", name="login", methods={"GET"})
     */
    public function loginAction()
    {

    }
}
