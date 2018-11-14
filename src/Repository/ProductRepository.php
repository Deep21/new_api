<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @param int $id
     *
     * @return mixed|null
     */
    public function findProductBy(int $id)
    {
        $product = null;
        try {
            $product = $this->createQueryBuilder('product')
                ->select(['product, product_attribute'])
                ->where('product.id = :id')
                ->leftJoin('product.productAttribute', 'product_attribute')
                ->setParameter('id', $id)
                ->getQuery()
                ->getSingleResult();

        } catch (NoResultException $e) {
            throw new NotFoundHttpException('Not Found');
        } catch (NonUniqueResultException $e) {
        }

        return $product;
    }

    /**
     * @param Product $product
     * @return Product
     * @throws \Doctrine\ORM\ORMException
     */
    public function createProduct(Product $product)
    {
        $em = $this->getEntityManager();
        $p = new Product();

        if($product->getManufacturer() != null) {
            $m = $em->getReference('App:Manufacturer', $product->getManufacturer()->getId());
            $p->setManufacturer($m);
        }

        $p->setQuantity($product->getQuantity());
        $p->setPrice($product->getPrice());
        $p->setIsActive($product->getIsActive());
        $p->setEcotax($product->getEcotax());
        $p->setIsOnSale($product->getIsOnSale());
        $p->setMinimalQuantity($product->getMinimalQuantity());
        $p->setWholesalePrice($product->getWholesalePrice());
        $p->setReference($product->getReference());
        $p->setUpc($product->getUpc());
        $p->setIsbn($product->getIsbn());
        $p->setEan13($product->getEan13());
        $em->persist($p);

        $em->flush();

        return $p;
    }
}
