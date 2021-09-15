<?php

namespace App\Entity;

use App\Repository\PlageHoraireRepository;
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
}
