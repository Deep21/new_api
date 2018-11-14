<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\ORMException;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View as ViewAnnotation;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ProductController extends FOSRestController
{
    /**
     * @Annotations\Get(
     *     path="/product/{product}",
     *     name = "get_product"
     * )
     * @Entity("product", expr="repository.findProductBy(product)", class="App\Entity\Product")
     * @param Product $product
     * @ViewAnnotation(serializerGroups={"product"}, statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function getProductAction(Product $product): View
    {
        return $this->view($product);
    }

    /**
     * @Annotations\Post(
     *     path="/product",
     *     name = "new_product"
     * )
     *
     * @ParamConverter("product", converter="fos_rest.request_body", class="App\Entity\Product")
     * @ViewAnnotation(serializerGroups={"product"}, statusCode=Response::HTTP_OK)
     *
     * @param ConstraintViolationListInterface $validationErrors
     * @param Product                          $product
     *
     * @return View
     */
    public function newProductAction(ConstraintViolationListInterface $validationErrors, Product $product): View
    {
        if (count($validationErrors) > 0) {
            return $this->view([], Response::HTTP_BAD_REQUEST);
        }
        $p = null;

        try {

            $p = $this
                ->getDoctrine()
                ->getRepository('App:Product')
                ->createProduct($product);

        } catch (ORMException $e) {

        }

        return $this->view($p->getId());

    }

    /**
     * @Annotations\Delete(
     *     path="/product/{product}",
     *     name = "remove_product"
     * )
     *
     * @Entity("product", expr="repository.findProductBy(product)", class="App\Entity\Product")
     * @param                                        Product $product
     * @ViewAnnotation(serializerGroups={"product"}, statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function removeProductAction(Product $product): View
    {
        return $this->view($product->getId());
    }

    /**
     * @Annotations\Put(
     *     path="/product/{product}",
     *     name = "update_product"
     * )
     *
     * @ParamConverter("product", converter="fos_rest.request_body", class="App\Entity\Product")
     *
     * @param ConstraintViolationListInterface $validationErrors
     * @param Product                          $product
     *
     * @return                                       View
     * @ViewAnnotation(serializerGroups={"product"}, statusCode=Response::HTTP_OK)
     */
    public function editProductAction(ConstraintViolationListInterface $validationErrors, Product $product): View
    {
        return $this->view($product->getId());
    }
}
