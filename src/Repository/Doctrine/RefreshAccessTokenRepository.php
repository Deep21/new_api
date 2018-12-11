<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 07/12/18
 * Time: 14:14
 */

namespace App\Repository\Doctrine;

use App\Entity\Bridge\RefreshTokenEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use League\OAuth2\Server\Entities\RefreshTokenEntityInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RefreshTokenEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method RefreshTokenEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method RefreshTokenEntity[]    findAll()
 * @method RefreshTokenEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RefreshAccessTokenRepository extends ServiceEntityRepository
{
    const REVOKED  = 1;
    const UNREVOKE = 0;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RefreshTokenEntity::class);
    }

    /**
     * @param string $tokenId
     * @return mixed
     */
    public function isTokenExist(string $tokenId)
    {
        $token = $this->findOneBy(['refresh_token' => $tokenId]);
        if ($token === null) {
            return false;
        }

        return $token->isRevoked();
    }

    /**
     * @param string $tokenId
     */
    public function revokeAccessToken(string $tokenId)
    {
        $this
            ->createQueryBuilder('a')
            ->update()
            ->set('a.isRevoked', ':isRevoked')
            ->where('a.accessToken = :tokenId')
            ->setParameters(
                [
                    'tokenId'   => $tokenId,
                    'isRevoked' => self::REVOKED,
                ]
            )
            ->getQuery()
            ->execute();
    }

    /**
     * @param RefreshTokenEntityInterface $refreshTokenEntity
     */
    public function saveToken(RefreshTokenEntityInterface $refreshTokenEntity)
    {
        $refreshToken = new RefreshTokenEntity($refreshTokenEntity->getIdentifier(), $refreshTokenEntity->getExpiryDateTime());
        $this->_em->persist($refreshToken);
        $this->_em->flush();
    }

}
