<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 07/12/18
 * Time: 14:14
 */

namespace App\Repository\Doctrine;

use App\Entity\Bridge\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OAuthUserRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @param string $clients
     * @param string $secret
     * @return User|null
     */
    public function getUser(string $clients, string $secret)
    {
        return $this->findOneBy(['id' => $clients, 'clientSecret' =>$secret]);
    }
}
