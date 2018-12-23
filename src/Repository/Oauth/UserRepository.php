<?php
/**
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace App\Repository\Oauth;

use App\Entity\Oauth\User;
use App\Repository\Doctrine\OAuthUserRepository;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Repositories\UserRepositoryInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserRepository implements UserRepositoryInterface
{

    private $encoder;
    /**
     * @var OAuthUserRepository
     */
    private $authUserRepository;

    /**
     * UserRepository constructor.
     * @param OAuthUserRepository $authUserRepository
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(OAuthUserRepository $authUserRepository, UserPasswordEncoderInterface $encoder)
    {
        $this->authUserRepository = $authUserRepository;
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
        $oauthUser = $this->authUserRepository->findOneBy(['username' => $username]);

        if ($oauthUser == null || !$this->encoder->isPasswordValid($oauthUser, $password)) {
            return null;
        }

        return new User($oauthUser->getId());
    }
}
