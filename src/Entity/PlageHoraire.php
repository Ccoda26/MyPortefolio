<?php

namespace App\Entity;

use App\Repository\PlageHoraireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlageHoraireRepository::class)
 */
class PlageHoraire
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
    private $begin_at_am;

    /**
     * @ORM\Column(type="time")
     */
    private $end_at_am;

    /**
     * @ORM\Column(type="time")
     */
    private $begin_at_pm;

    /**
     * @ORM\Column(type="time")
     */
    private $end_at_pm;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $day;

    /**
     * @ORM\OneToMany(targetEntity=Booking::class, mappedBy="plageHoraire")
     */
    private $booking;

    /**
     * @ORM\ManyToMany(targetEntity=Adresse::class, inversedBy="plageHoraires")
     */
    private $adresse;

    public function __construct()
    {
        $this->booking = new ArrayCollection();
        $this->adresse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginAtAm(): ?\DateTimeInterface
    {
        return $this->begin_at_am;
    }

    public function setBeginAtAm(\DateTimeInterface $begin_at_am): self
    {
        $this->begin_at_am = $begin_at_am;

        return $this;
    }

    public function getEndAtAm(): ?\DateTimeInterface
    {
        return $this->end_at_am;
    }

    public function setEndAtAm(\DateTimeInterface $end_at_am): self
    {
        $this->end_at_am = $end_at_am;

        return $this;
    }

    public function getBeginAtPm(): ?\DateTimeInterface
    {
        return $this->begin_at_pm;
    }

    public function setBeginAtPm(\DateTimeInterface $begin_at_pm): self
    {
        $this->begin_at_pm = $begin_at_pm;

        return $this;
    }

    public function getEndAtPm(): ?\DateTimeInterface
    {
        return $this->end_at_pm;
    }

    public function setEndAtPm(\DateTimeInterface $end_at_pm): self
    {
        $this->end_at_pm = $end_at_pm;

        return $this;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    /**
     * @return Collection|Booking[]
     */
    public function getBooking(): Collection
    {
        return $this->booking;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->booking->contains($booking)) {
            $this->booking[] = $booking;
            $booking->setPlageHoraire($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->booking->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getPlageHoraire() === $this) {
                $booking->setPlageHoraire(null);
            }
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
