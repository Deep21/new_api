<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 07/12/18
 * Time: 14:14
 */

namespace App\Repository\Doctrine;

use App\Entity\Bridge\OAUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OAUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method OAUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method OAUser[]    findAll()
 * @method OAUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OAuthUserRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OAUser::class);
    }

    /**
     * @param string $clients
     * @param string $secret
     * @return OAUser|null
     */
    public function getUser(string $clients, string $secret)
    {
        return $this->findOneBy(['id' => $clients, 'clientSecret' =>$secret]);
    }
}
