<?php

namespace App\Entity;

use App\Repository\SpecialiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialiteRepository::class)
 */
class Specialite
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
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="speciality")
     */
    private $usersSpeciality;

    /**
     * @ORM\ManyToMany(targetEntity=Adresse::class, inversedBy="specialites")
     */
    private $adresse;

    public function __construct()
    {
        $this->usersSpeciality = new ArrayCollection();
        $this->adresse = new ArrayCollection();
    }

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

    /**
     * @return Collection|User[]
     */
    public function getUsersSpeciality(): Collection
    {
        return $this->usersSpeciality;
    }

    public function addUsersSpeciality(User $usersSpeciality): self
    {
        if (!$this->usersSpeciality->contains($usersSpeciality)) {
            $this->usersSpeciality[] = $usersSpeciality;
            $usersSpeciality->addSpeciality($this);
        }

        return $this;
    }

    public function removeUsersSpeciality(User $usersSpeciality): self
    {
        if ($this->usersSpeciality->removeElement($usersSpeciality)) {
            $usersSpeciality->removeSpeciality($this);
        }

        return $this;
    }

    /**
     * @return Collection|Adresse[]
     */
    public function getAdresse(): Collection
    {
        return $this->adresse;
    }

    public function addAdresse(Adresse $adresse): self
    {
        if (!$this->adresse->contains($adresse)) {
            $this->adresse[] = $adresse;
        }

        return $this;
    }

    public function removeAdresse(Adresse $adresse): self
    {
        $this->adresse->removeElement($adresse);

        return $this;
    }
}
