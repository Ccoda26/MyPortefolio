<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $begin;

    /**
     * @ORM\Column(type="time")
     */
    private $end;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bookingUsers")
     */
    private $userBooking;

    /**
     * @ORM\OneToMany(targetEntity=Service::class, mappedBy="booking")
     */
    private $services;

    /**
     * @ORM\ManyToOne(targetEntity=PlageHoraire::class, inversedBy="booking")
     */
    private $plageHoraire;

    /**
     * @ORM\ManyToOne(targetEntity=Adresse::class, inversedBy="bookings")
     */
    private $adresse;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBegin(): ?\DateTimeInterface
    {
        return $this->begin;
    }

    public function setBegin(\DateTimeInterface $begin): self
    {
        $this->begin = $begin;

        return $this;
    }

    public function getEnd(): ?string
    {
        return $this->end;
    }

    public function setEnd(string $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getUserBooking(): ?User
    {
        return $this->userBooking;
    }

    public function setUserBooking(?User $userBooking): self
    {
        $this->userBooking = $userBooking;

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->setBooking($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getBooking() === $this) {
                $service->setBooking(null);
            }
        }

        return $this;
    }

    public function getPlageHoraire(): ?PlageHoraire
    {
        return $this->plageHoraire;
    }

    public function setPlageHoraire(?PlageHoraire $plageHoraire): self
    {
        $this->plageHoraire = $plageHoraire;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
}
