<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OauthClients
 *
 * @ORM\Table(name="oauth_clients")
 * @ORM\Entity
 */
class OauthAccessTokens
{
    /**
     * @var string
     *
     * @ORM\Column(name="access_token", type="string", length=40, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $accessToken;

    /**
     * @var string|null
     *
     * @ORM\Column(name="client_id", type="string", length=80, nullable=false)
     */
    private $clientId;

    /**
     * @var integer|null
     *
     * @ORM\Column(name="user_id", type="integer", length=10, nullable=false)
     */
    private $userId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="expires", type="datetime", nullable=false)
     */
    private $expires;

    /**
     * @var string|null
     *
     * @ORM\Column(name="scope", type="string", length=4000, nullable=true)
     */
    private $scope;


    public function getClientId(): ?string
    {
        return $this->clientId;
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

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    public function setClientId(string $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getExpires(): ?\DateTimeInterface
    {
        return $this->expires;
    }

    public function setExpires(\DateTimeInterface $expires): self
    {
        $this->expires = $expires;

        return $this;
    }


}
