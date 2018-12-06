<?php

namespace App\Controller;

use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\View as ViewAnnotation;
use FOS\RestBundle\View\View;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\PasswordGrant;
use League\OAuth2\Server\ResourceServer;
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
     * @Annotations\Get(
     *     path="/protected",
     *     name = "protected_resource"
     * )
     * @ViewAnnotation(statusCode=Response::HTTP_OK)
     * @param ServerRequestInterface $request
     * @param ResourceServer $resourceServer
     * @throws \League\OAuth2\Server\Exception\OAuthServerException
     *
     * @return View
     */
    public function loginAction(ServerRequestInterface $request, ResourceServer $resourceServer) : View
    {
        dump($resourceServer->validateAuthenticatedRequest($request));
        die('protected');
    }
}
