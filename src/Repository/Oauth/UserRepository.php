<?php
/**
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace App\Repository\Oauth;

use App\Entity\Oauth\UserEntity;
use App\Entity\OauthUsers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Repositories\UserRepositoryInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    /**
     * @var RegistryInterface
     */
    private $registry;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(RegistryInterface $registry, UserPasswordEncoderInterface $encoder)
    {
        parent::__construct($registry, OauthUsers::class);
        $this->registry = $registry;
        $this->encoder = $encoder;
    }

    /**
     * {@inheritdoc}
     */
    public function getUserEntityByUserCredentials(
        $username,
        $password,
        $grantType,
        ClientEntityInterface $clientEntity
    ) {

        if ($username === 'alex' && $password === 'whisky') {
            $oauthUser = $this->findOneBy(['password' => $password]);
            dump($this->encoder);exit;
            return new UserEntity();
        }

        return;
    }
}
