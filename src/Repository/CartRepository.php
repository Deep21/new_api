<?php

namespace App\Repository;

use App\Entity\Cart;
use App\Entity\Employee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method Cart|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cart|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cart[]    findAll()
 * @method Cart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Cart::class);
    }

    /**
     * @return array
     */
    public function getCartCollection(): array
    {
        return $this
            ->createQueryBuilder('cart')
                ->select(['cart'])
                ->leftJoin('cart', 'o')
                ->getQuery()
                ->getArrayResult();
    }

    /**
     * @param Cart $cart
     *
     * @return Cart
     * @throws \Doctrine\ORM\ORMException
     */
    public function create(Cart $cart)
    {
        $em = $this->getEntityManager();
        $employee = $em->getReference(Employee::class, 2);
        $cart->setEmployee($employee);
        $em->persist($cart);

        $em->flush();

        return $cart;
    }

    /**
     * @param int $currentUserId
     * @param int $cartId
     */
    public function setEmployee(int $currentUserId, int $cartId)
    {
        $qb = $this->createQueryBuilder('r');
        $qb->update()
            ->set('r.employee', ':employee')
            ->where('r.id = :id')
            ->setParameter('employee', $currentUserId)
            ->setParameter('id', $cartId)
            ->getQuery()
            ->execute();
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function getCartById(int $id)
    {
        try {
            return $this->createQueryBuilder('c')
                ->select(['c'])
                ->where('c.id = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getSingleResult();
        } catch (NoResultException $e) {
            throw new NotFoundHttpException('Not Found');
        } catch (NonUniqueResultException $e) {
        }
    }

}
