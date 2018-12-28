<?php

namespace App\Entity\Bridge;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="oauth_scope")
 * @ORM\Entity(repositoryClass="App\Repository\Doctrine\ScopeRepository")
 */
class Scope
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $scope = [];

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScope(): ?array
    {
        return $this->scope;
    }

    public function setScope(array $scope): self
    {
        $this->scope = $scope;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
