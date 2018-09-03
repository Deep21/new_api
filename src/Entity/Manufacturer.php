<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Manufacturer.
 *
 * @ORM\Entity(repositoryClass="App\Repository\ManufacturerRepository")
 */
class Manufacturer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"product"})
     */
    private $id;

    /**
     * @var                                            Collection|Product[]
     * @ORM\OneToMany(targetEntity=CartProduct::class, cascade={"persist", "remove"}, mappedBy="manufacturer")
     */
    private $product;
    /**
     * @var                                        Collection|Address[]
     * @ORM\OneToMany(targetEntity=Address::class, cascade={"persist", "remove"}, mappedBy="manufacturer")
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_add;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_upd;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * Manufacturer constructor.
     */
    public function __construct()
    {
        $this->address = new ArrayCollection();
        $this->product = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Manufacturer
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateAdd(): ?\DateTimeInterface
    {
        return $this->date_add;
    }

    /**
     * @param \DateTimeInterface $date_add
     *
     * @return Manufacturer
     */
    public function setDateAdd(\DateTimeInterface $date_add): self
    {
        $this->date_add = $date_add;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateUpd(): ?\DateTimeInterface
    {
        return $this->date_upd;
    }

    /**
     * @param \DateTimeInterface $date_upd
     *
     * @return Manufacturer
     */
    public function setDateUpd(\DateTimeInterface $date_upd): self
    {
        $this->date_upd = $date_upd;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     *
     * @return Manufacturer
     */
    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Address[]|Collection
     */
    public function getAddress(): Collection
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function addAddress(Address $address): void
    {
        $this->address->add($address);
        $address->setCustomer($this);
    }

    public function removeAddress(Address $address): self
    {
        if ($this->address->contains($address)) {
            $this->address->removeElement($address);
            // set the owning side to null (unless already changed)
            if ($address->getManufacturer() === $this) {
                $address->setManufacturer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
            $product->setManufacturer($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->product->contains($product)) {
            $this->product->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getManufacturer() === $this) {
                $product->setManufacturer(null);
            }
        }

        return $this;
    }
}
