<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 19/08/18
 * Time: 20:04.
 */

namespace App\Repository;

use App\Entity\Employee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method Employee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employee[]    findAll()
 * @method Employee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Employee::class);
    }

    /**
     * @param int $id
     *
     * @return mixed|null
     */
    public function findEmployeeBy(int $id)
    {
        $employee = null;
        try {
            $employee = $this->createQueryBuilder('employee')
                ->select(['employee'])
                ->where('employee.id = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getSingleResult();
        } catch (NoResultException $e) {
            throw new NotFoundHttpException('Not Found');
        } catch (NonUniqueResultException $e) {
        }

        return $employee;
    }

    /**
     * @return array
     */
    public function getEmployeeCollection()
    {
        return $this->createQueryBuilder('employee')
            ->select(['employee'])
            ->getQuery()
            ->getArrayResult();
    }
}
