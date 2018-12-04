<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 25/10/18
 * Time: 22:38.
 */

namespace App\Listener;

use League\OAuth2\Server\Exception\OAuthServerException;
use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Zend\Diactoros\Response\JsonResponse;

class ExceptionListener implements EventSubscriberInterface
{
    /**
     * ExceptionListener constructor.
     *
     */
    public function __construct()
    {

    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return string[]
     */
    public static function getSubscribedEvents(): array
    {
        return [
          KernelEvents::EXCEPTION => [
              ['processException']
          ]
        ];
    }

    public function processException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        if($exception instanceof OAuthServerException) {
            $jsonResponse = new JsonResponse($exception->getPayload(), $exception->getHttpStatusCode());
            $httpFoundationFactory = new HttpFoundationFactory();
            $event->setResponse($httpFoundationFactory->createResponse($jsonResponse));
        }

    }

}
