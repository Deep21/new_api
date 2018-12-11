<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 11/12/18
 * Time: 17:17
 */

namespace App\Entity\Bridge;

use Doctrine\ORM\Mapping as ORM;
/**
 * OAuthClient.
 *
 * @ORM\Table(name="oauth_client")
 * @ORM\Entity(repositoryClass="App\Repository\Doctrine\OAuthClientRepository")
 */
class OAuthClient
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="client_secret", type="string", length=80, nullable=true)
     */
    private $clientSecret;

    /**
     * @var string|null
     *
     * @ORM\Column(name="redirect_uri", type="string", length=2000, nullable=true)
     */
    private $redirectUri;

    /**
     * @var string|null
     *
     * @ORM\Column(name="grant_types", type="string", length=80, nullable=true)
     */
    private $grantTypes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="scope", type="string", length=4000, nullable=true)
     */
    private $scope;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_id", type="string", length=80, nullable=true)
     */
    private $userId;


    public function getClientSecret(): ?string
    {
        return $this->clientSecret;
    }

    public function setClientSecret(?string $clientSecret): self
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    public function getRedirectUri(): ?string
    {
        return $this->redirectUri;
    }

    public function setRedirectUri(?string $redirectUri): self
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }

    public function getGrantTypes(): ?string
    {
        return $this->grantTypes;
    }

    public function setGrantTypes(?string $grantTypes): self
    {
        $this->grantTypes = $grantTypes;

        return $this;
    }

    public function getScope(): ?string
    {
        return $this->scope;
    }

    public function setScope(?string $scope): self
    {
        $this->scope = $scope;

        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function setUserId(?string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}