<?php

namespace App\Controller;

use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\View as ViewAnnotation;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class FOSRestController.
 *
 * @Annotations\Route("user")
 */
class CurrencyController extends FOSRestController
{
    /**
     * @Annotations\Get(
     *     path="/currency",
     *     name = "get_currency"
     * )
     * @ViewAnnotation(statusCode=Response::HTTP_OK)
     * @return View
     */
    public function getCurrencyAction(): View
    {

    }

    /**
     * @Annotations\Get(
     *     path="/currencies",
     *     name = "get_currency_collection"
     * )
     * @ViewAnnotation(statusCode=Response::HTTP_OK)
     * @return View
     */
    public function getCurrencyCollectionAction(): View
    {

    }

    /**
     * @Annotations\Post(
     *     path="/currency",
     *     name = "get_currency_collection"
     * )
     * @ViewAnnotation(statusCode=Response::HTTP_OK)
     * @return View
     */
    public function postCurrencyAction(): View
    {

    }

    /**
     * @Annotations\Put(
     *     path="/currency",
     *     name = "edit_currency"
     * )
     * @ViewAnnotation(statusCode=Response::HTTP_OK)
     * @return View
     */
    public function editCurrencyAction(): View
    {

    }

    /**
     * @Annotations\Delete(
     *     path="/currency",
     *     name = "delete_currency"
     * )
     * @ViewAnnotation(statusCode=Response::HTTP_OK)
     * @return View
     */
    public function deleteCurrencyAction(): View
    {

    }
}
