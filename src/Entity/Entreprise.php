<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="Company")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity=Service::class, inversedBy="CompanyService")
     */
    private $Service;

    /**
     * @ORM\OneToOne(targetEntity=PlageHoraire::class, cascade={"persist", "remove"})
     */
    private $PlageHoraire;

    /**
     * @ORM\OneToMany(targetEntity=Adresse::class, mappedBy="entreprise")
     */
    private $Adresse;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="entreprise")
     */
    private $media;

    /**
     * @ORM\ManyToMany(targetEntity=Domaine::class, inversedBy="entreprises")
     */
    private $Domaine;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->Service = new ArrayCollection();
        $this->Adresse = new ArrayCollection();
        $this->media = new ArrayCollection();
        $this->Domaine = new ArrayCollection();
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

    /**
     * @return Collection|User[]
     */
    public function getusers(): Collection
    {
        return $this->users;
    }

    public function addusers(User $users): self
    {
        if (!$this->users->contains($users)) {
            $this->users[] = $users;
            $users->setCompany($this);
        }

        return $this;
    }

    public function removeusers(User $users): self
    {
        if ($this->users->removeElement($users)) {
            // set the owning side to null (unless already changed)
            if ($users->getCompany() === $this) {
                $users->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getService(): Collection
    {
        return $this->Service;
    }

    public function addService(Service $service): self
    {
        if (!$this->Service->contains($service)) {
            $this->Service[] = $service;
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        $this->Service->removeElement($service);

        return $this;
    }

    public function getPlageHoraire(): ?PlageHoraire
    {
        return $this->PlageHoraire;
    }

    public function setPlageHoraire(?PlageHoraire $PlageHoraire): self
    {
        $this->PlageHoraire = $PlageHoraire;

        return $this;
    }

    /**
     * @return Collection|Adresse[]
     */
    public function getAdresse(): Collection
    {
        return $this->Adresse;
    }

    public function addAdresse(Adresse $adresse): self
    {
        if (!$this->Adresse->contains($adresse)) {
            $this->Adresse[] = $adresse;
            $adresse->setEntreprise($this);
        }

        return $this;
    }

    public function removeAdresse(Adresse $adresse): self
    {
        if ($this->Adresse->removeElement($adresse)) {
            // set the owning side to null (unless already changed)
            if ($adresse->getEntreprise() === $this) {
                $adresse->setEntreprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Image $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media[] = $medium;
            $medium->setEntreprise($this);
        }

        return $this;
    }

    public function removeMedium(Image $medium): self
    {
        if ($this->media->removeElement($medium)) {
            // set the owning side to null (unless already changed)
            if ($medium->getEntreprise() === $this) {
                $medium->setEntreprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Domaine[]
     */
    public function getDomaine(): Collection
    {
        return $this->Domaine;
    }

    public function addDomaine(Domaine $domaine): self
    {
        if (!$this->Domaine->contains($domaine)) {
            $this->Domaine[] = $domaine;
        }

        return $this;
    }

    public function removeDomaine(Domaine $domaine): self
    {
        $this->Domaine->removeElement($domaine);

        return $this;
    }
}
