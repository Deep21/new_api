<?php
/**
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace App\Repository\Oauth;

use App\Entity\Oauth\RefreshTokenEntity;
use App\Repository\Doctrine\RefreshAccessTokenRepository;
use Doctrine\ORM\EntityManagerInterface;
use League\OAuth2\Server\Entities\RefreshTokenEntityInterface;
use League\OAuth2\Server\Repositories\RefreshTokenRepositoryInterface;

class RefreshTokenRepository implements RefreshTokenRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var RefreshAccessTokenRepository
     */
    private $refreshAccessTokenRepository;

    /**
     * RefreshTokenRepository constructor.
     * @param EntityManagerInterface $entityManager
     * @param RefreshAccessTokenRepository $refreshAccessTokenRepository
     */
    public function __construct(EntityManagerInterface $entityManager, RefreshAccessTokenRepository $refreshAccessTokenRepository)
    {
        $this->entityManager = $entityManager;
        $this->refreshAccessTokenRepository = $refreshAccessTokenRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function persistNewRefreshToken(RefreshTokenEntityInterface $refreshTokenEntity)
    {
        $t = new \App\Entity\Bridge\RefreshTokenEntity($refreshTokenEntity->getIdentifier(), $refreshTokenEntity->getExpiryDateTime());
        $this->entityManager->persist($t);
        $this->entityManager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function revokeRefreshToken($tokenId)
    {


        // Some logic to revoke the refresh token in a database
    }

    /**
     * {@inheritdoc}
     */
    public function isRefreshTokenRevoked($tokenId) : bool
    {
        return $this->refreshAccessTokenRepository->isTokenExist($tokenId);
    }

    /**
     * {@inheritdoc}
     */
    public function getNewRefreshToken()
    {
        return new RefreshTokenEntity();
    }
}
