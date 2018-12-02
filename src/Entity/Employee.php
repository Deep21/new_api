<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Employee.
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeRepository")
 */
class Employee
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer",          nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var                                            Collection|Cart[]
     * @ORM\OneToMany(targetEntity=CartProduct::class, cascade={"persist", "remove"}, mappedBy="employee")
     */
    private $cart;

    /**
     * @ORM\Column(type="string", length=32)
     * @Groups({"employee"})
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=32)
     * @Groups({"employee"})
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=128)
     * @Groups({"employee"})
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"employee"})
     */
    private $is_active;

    public function __construct()
    {
        $this->cart = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): self
    {
        $this->is_active = $is_active;

        return $this;
    }

    /**
     * @return Collection|Cart[]
     */
    public function getCart(): Collection
    {
        return $this->cart;
    }

    public function addCart(Cart $cart): self
    {
        if (!$this->cart->contains($cart)) {
            $this->cart[] = $cart;
            $cart->setEmployee($this);
        }

        return $this;
    }

    public function removeCart(Cart $cart): self
    {
        if ($this->cart->contains($cart)) {
            $this->cart->removeElement($cart);
            // set the owning side to null (unless already changed)
            if ($cart->getEmployee() === $this) {
                $cart->setEmployee(null);
            }
        }

        return $this;
    }

    /**
     * @param int $id
     * @return Employee
     */
    public function setId(int $id): Employee
    {
        $this->id = $id;
        return $this;
    }
}
