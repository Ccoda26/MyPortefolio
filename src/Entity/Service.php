<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
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
     * @ORM\Column(type="time")
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $price;

    /**
     * @ORM\ManyToMany(targetEntity=Entreprise::class, mappedBy="Service")
     */
    private $CompanyService;

    /**
     * @ORM\ManyToOne(targetEntity=Booking::class, inversedBy="services")
     */
    private $booking;

    /**
     * @ORM\ManyToMany(targetEntity=Adresse::class, inversedBy="services")
     */
    private $Adresses;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, cascade={"persist", "remove"})
     */
    private $Image;

    public function __construct()
    {
        $this->CompanyService = new ArrayCollection();
        $this->Adresses = new ArrayCollection();
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

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(\DateTimeInterface $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Entreprise[]
     */
    public function getCompanyService(): Collection
    {
        return $this->CompanyService;
    }

    public function addCompanyService(Entreprise $companyService): self
    {
        if (!$this->CompanyService->contains($companyService)) {
            $this->CompanyService[] = $companyService;
            $companyService->addService($this);
        }

        return $this;
    }

    public function removeCompanyService(Entreprise $companyService): self
    {
        if ($this->CompanyService->removeElement($companyService)) {
            $companyService->removeService($this);
        }

        return $this;
    }

    public function getBooking(): ?Booking
    {
        return $this->booking;
    }

    public function setBooking(?Booking $booking): self
    {
        $this->booking = $booking;

        return $this;
    }

    /**
     * @return Collection|Adresse[]
     */
    public function getAdresses(): Collection
    {
        return $this->Adresses;
    }

    public function addAdress(Adresse $adress): self
    {
        if (!$this->Adresses->contains($adress)) {
            $this->Adresses[] = $adress;
        }

        return $this;
    }

    public function removeAdress(Adresse $adress): self
    {
        $this->Adresses->removeElement($adress);

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->Image;
    }

    public function setImage(?Image $Image): self
    {
        $this->Image = $Image;

        return $this;
    }
}
