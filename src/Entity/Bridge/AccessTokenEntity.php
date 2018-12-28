<?php
/**
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace App\Entity\Bridge;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccessTokenEntity.
 *
 * @ORM\Table(name="oauth_access_token")
 * @ORM\Entity(repositoryClass="App\Repository\Oauth\AccessTokenRepository")
 */
class AccessTokenEntity
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
     * @var string
     *
     * @ORM\Column(name="access_token", type="string", length=80, nullable=false)
     */
    private $accessToken;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $scope;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(name="expire_at", type="datetime", nullable=false)
     */
    private $expireAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_revoked", type="boolean", nullable=false)
     */
    private $isRevoked;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * AccessTokenEntity constructor.
     *
     */
    public function __construct()
    {
        $this->updatedAt = new \DateTimeImmutable();
        $this->createdAt = new \DateTimeImmutable();
        $this->isRevoked = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    public function setAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    public function getScope(): ?string
    {
        return $this->scope;
    }

    public function setScope(string $scope): self
    {
        $this->scope = $scope;

        return $this;
    }

    public function getExpireAt(): ?\DateTimeInterface
    {
        return $this->expireAt;
    }

    public function setExpireAt(\DateTimeInterface $expireAt): self
    {
        $this->expireAt = $expireAt;

        return $this;
    }

    public function getIsRevoked(): ?bool
    {
        return $this->isRevoked;
    }

    public function setIsRevoked(bool $isRevoked): self
    {
        $this->isRevoked = $isRevoked;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
