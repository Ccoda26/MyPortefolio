<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntrepriseRepository::class)
 */
class Entreprise
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NEQ;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $color_one;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $color_two;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNEQ(): ?string
    {
        return $this->NEQ;
    }

    public function setNEQ(string $NEQ): self
    {
        $this->NEQ = $NEQ;

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

    public function getColorOne(): ?string
    {
        return $this->color_one;
    }

    public function setColorOne(string $color_one): self
    {
        $this->color_one = $color_one;

        return $this;
    }

    public function getColorTwo(): ?string
    {
        return $this->color_two;
    }

    public function setColorTwo(string $color_two): self
    {
        $this->color_two = $color_two;

        return $this;
    }
}
