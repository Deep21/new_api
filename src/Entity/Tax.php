<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="tax")
 * @ORM\Entity(repositoryClass="App\Repository\TaxRepository")
 */
class Tax
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

}