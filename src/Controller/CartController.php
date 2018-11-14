<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Event\CartEvent;
use App\Model\CartProduct;
use App\Service\CartManager;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Query\Expr\Join;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\View as ViewAnnotation;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class CartController extends FOSRestController
{
    /**
     * @Annotations\Get(
     *     path="/carts",
     *     name = "get_cart_items"
     * )
     *
     * @ViewAnnotation(statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function getCartCollectionAction(): View
    {
        $carts = $this
            ->getDoctrine()
            ->getRepository(Cart::class)
            ->getCartCollection();

        return $this->view($carts);
    }

    /**
     * @Annotations\Get(
     *     path="/cart/{cart}",
     *     name = "get_cart"
     * )
     * @ViewAnnotation(statusCode=Response::HTTP_OK)
     * @param Request $request
     * @return View
     */
    public function getCartAction(Request $request): View
    {
        $cartId = $request->get('cart');
        $cart   = $this
                ->getDoctrine()
                ->getRepository("App:CartProduct")
                ->getCartDetail($cartId);

        return $this->view($cart);
    }

    /**
     * @Annotations\Post(
     *     path="/cart",
     *     name = "add_product"
     * )
     *
     * @ParamConverter("cartProduct",             converter="fos_rest.request_body", class="App\Model\CartProduct")
     * @ViewAnnotation(serializerGroups={"cart"}, statusCode=Response::HTTP_OK)
     *
     * @param ConstraintViolationListInterface $validationErrors
     * @param CartProduct                      $cartProduct
     * @param CartManager                      $cartManager
     *
     * @return View
     */
    public function addNewProductAction(ConstraintViolationListInterface $validationErrors, CartProduct $cartProduct, CartManager $cartManager): View
    {
        if (count($validationErrors) > 0) {
            return $this->view([], Response::HTTP_BAD_REQUEST);
        }
        $cart = $cartManager->createNewCart();
        $cartManager->createCartProduct($cart, $cartProduct);

        return $this->view(['id'=>$cart->getId()]);
    }

    /**
     * @Annotations\Delete(
     *     path="/cart/{cart}",
     *     name = "remove_cart"
     * )
     *
     * @ParamConverter("cart", class="App\Entity\CartProduct", options={"repository_method" = "getCartById"})
     *
     * @param                                        CartProduct $cartProduct
     * @ViewAnnotation(serializerGroups={"product"}, statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function removeCartAction(CartProduct $cartProduct): View
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($cartProduct);
        $em->flush();

        return $this->view($cartProduct->getId());
    }

    /**
     * @Annotations\Put(
     *     path="/cart",
     *     name = "update_cart"
     * )
     * @ParamConverter("cartProduct", converter="fos_rest.request_body", class="App\Model\CartProduct")
     * @param ConstraintViolationListInterface $validationErrors
     * @param CartProduct $cartProduct
     * @param Request $request
     * @return View* @ViewAnnotation(statusCode=Response::HTTP_OK)
     */
    public function editProductAction(ConstraintViolationListInterface $validationErrors, CartProduct $cartProduct, Request $request): View
    {
        if (count($validationErrors) > 0) {
            return $this->view([], Response::HTTP_BAD_REQUEST);
        }
        if($request->get('action') === 'up') {
            $this->get('event_dispatcher')->dispatch(CartEvent::CART_INCREASE, new CartEvent($cartProduct));

        }else if($request->get('action') === 'down'){
            $this->get('event_dispatcher')->dispatch(CartEvent::CART_DECREASE);
        }

        return $this->view(
            [
                'message' => 'updated',
                'id' => 1,
            ]
        );
    }
}
