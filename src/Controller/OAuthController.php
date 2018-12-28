<?php

namespace App\Controller;

use App\Repository\Oauth\RefreshTokenRepository;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\View as ViewAnnotation;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\PasswordGrant;
use League\OAuth2\Server\Grant\RefreshTokenGrant;
use League\OAuth2\Server\ResourceServer;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OAuthController extends FOSRestController
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
     * @Route("oauth/access-token", name="api_get_access_token", methods={"POST"})
     * @param ServerRequestInterface $request
     * @param RefreshTokenRepository $refreshTokenRepository
     * @return Response
     * @throws \Exception
     * @throws \League\OAuth2\Server\Exception\OAuthServerException
     */
    public function getAccessToken(ServerRequestInterface $request, RefreshTokenRepository $refreshTokenRepository): Response
    {
        // Enable the refresh token grant on the server
        $grant = new RefreshTokenGrant($refreshTokenRepository);
        $grant->setRefreshTokenTTL(new \DateInterval('P1M')); // The refresh token will expire in 1 month
        $this->authorizationServer->enableGrantType(
            $grant,
            new \DateInterval('PT3600S') // The new access token will expire after 1 hour
        );

        $this->passwordGrant->setRefreshTokenTTL(new \DateInterval('P1M'));
        $this->authorizationServer->enableGrantType(
            $this->passwordGrant,
            new \DateInterval('PT3600S')
        );

        $responseInterface = $this->authorizationServer->respondToAccessTokenRequest($request, new \Zend\Diactoros\Response());
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
        $resourceServer->validateAuthenticatedRequest($request);
        return $this->view([]);
    }
}
