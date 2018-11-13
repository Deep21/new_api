<?php

namespace App\Repository;

use App\Entity\Cart;
use App\Entity\CartProduct;
use App\Entity\Product;
use App\Entity\ProductAttribute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method CartProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method CartProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method CartProduct[]    findAll()
 * @method CartProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CartProduct::class);
    }

    /**
     * @param Cart $cart
     * @param \App\Model\CartProduct $cartProductModel
     */
    public function create(Cart $cart, \App\Model\CartProduct $cartProductModel)
    {
        try {
            $em = $this->getEntityManager();
            $product = $em->getReference(Product::class, $cartProductModel->getProduct());
            $productAttribute = $em->getReference(ProductAttribute::class, $cartProductModel->getProductAttribute());

            $cartProduct = new CartProduct();
            $cartProduct->setId($cart->getId());
            $cartProduct->setQuantity($cartProductModel->getQuantity());
            $cartProduct->setProduct($product);
            $cartProduct->setProductAttribute($productAttribute);
            $cartProduct->setCreatedAt(new \DateTime());
            $em->persist($cartProduct);
            $em->flush();

        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }
    }

    /**
     * @param CartProduct $cartProduct
     */
    public function updateProduct(CartProduct $cartProduct)
    {
        $this->createQueryBuilder('r')
            ->update()
            ->set('r.quantity', ':quantity')
            ->where('r.id = :id')
            ->andWhere('r.product = :product')
            ->andWhere('r.productAttribute = :productAttribute')
            ->setParameters(
                [
                    'id' => $cartProduct->getId(),
                    'quantity' => $cartProduct->getQuantity(),
                    'product' => $cartProduct->getProduct()->getId(),
                    'productAttribute' => $cartProduct->getProductAttribute()->getId(),
                ]
            )
            ->getQuery()
            ->execute();
    }

    /**
     * @param CartProduct $cartProduct
     */
    public function update(CartProduct $cartProduct)
    {
        $this->createQueryBuilder('c')
            ->update()
            ->set('c.product', ':product')
            ->set('c.productAttribute', ':productAttribute')
            ->set('c.quantity', ':quantity')
            ->where('c.id = :id')
            ->setParameter('product', $cartProduct->getProduct()->getId())
            ->setParameter('productAttribute', $cartProduct->getProductAttribute()->getId())
            ->setParameter('quantity', $cartProduct->getQuantity())
            ->setParameter('id', $cartProduct->getId())
            ->getQuery()
            ->execute();
    }

    /**
     * @param int $id
     *
     * @return CartProduct
     */
    public function getQuantity(int $id)
    {
        $qb = $this->createQueryBuilder('r');
        try {
            return $qb->andWhere('r.id = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getSingleResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException $e) {
            throw new NotFoundHttpException('Not Found');
        } catch (NonUniqueResultException $e) {
        }
    }

    /**
     * @param CartProduct $cartProduct
     *
     * @return mixed
     */
    public function upQty(CartProduct $cartProduct)
    {
        return $this->createQueryBuilder('c')
            ->update()
            ->set('c.quantity', ':quantity')
            ->where('c.id = :id')
            ->andWhere('c.product = :product')
            ->andWhere('c.productAttribute = :productAttribute')
            ->setParameter('quantity', $cartProduct->getQuantity() + 1)
            ->setParameter('product', $cartProduct->getProduct()->getId())
            ->setParameter('productAttribute', $cartProduct->getProductAttribute()->getId())
            ->getQuery()
            ->execute();
    }

    /**
     * @param int $id
     */
    public function deleteCart(int $id)
    {
        $this
            ->createQueryBuilder('c')
            ->delete()
            ->where('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
    }

    /**
     * @param CartProduct $cart
     *
     * @return mixed
     */
    public function downQty(CartProduct $cart)
    {
        return $this->createQueryBuilder('c')
            ->update()
            ->set('c.quantity', ':quantity')
            ->where('c.id = :id')
            ->andwhere('c.product = :product')
            ->setParameter('product', $cart->getProduct())
            ->setParameter('quantity', $cart->getQuantity() - 1)
            ->setParameter('id', $cart->getId())
            ->getQuery()
            ->execute();
    }

    /**
     * @param int $id
     *
     * @return mixed|null
     */
    public function getCart(int $id)
    {
        try {
            return $this->createQueryBuilder('c')
                ->andWhere('c.id = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getSingleResult();
        } catch (NoResultException $e) {
            throw new NotFoundHttpException('Not found');
        } catch (NonUniqueResultException $e) {
        }

        return null;
    }
}
