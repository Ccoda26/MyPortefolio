<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="users")
     */
    private $role;

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="$users")
     */
    private $Company;

    /**
     * @ORM\ManyToMany(targetEntity=Specialite::class, inversedBy="usersSpeciality")
     */
    private $speciality;

    /**
     * @ORM\OneToMany(targetEntity=Booking::class, mappedBy="userBooking")
     */
    private $bookingUsers;

    public function __construct()
    {
        $this->speciality = new ArrayCollection();
        $this->bookingUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getCompany(): ?Entreprise
    {
        return $this->Company;
    }

    public function setCompany(?Entreprise $Company): self
    {
        $this->Company = $Company;

        return $this;
    }

    /**
     * @return Collection|Specialite[]
     */
    public function getSpeciality(): Collection
    {
        return $this->speciality;
    }

    public function addSpeciality(Specialite $speciality): self
    {
        if (!$this->speciality->contains($speciality)) {
            $this->speciality[] = $speciality;
        }

        return $this;
    }

    public function removeSpeciality(Specialite $speciality): self
    {
        $this->speciality->removeElement($speciality);

        return $this;
    }

    /**
     * @return Collection|Booking[]
     */
    public function getBookingUsers(): Collection
    {
        return $this->bookingUsers;
    }

    public function addBookingUser(Booking $bookingUser): self
    {
        if (!$this->bookingUsers->contains($bookingUser)) {
            $this->bookingUsers[] = $bookingUser;
            $bookingUser->setUserBooking($this);
        }

        return $this;
    }

    public function removeBookingUser(Booking $bookingUser): self
    {
        if ($this->bookingUsers->removeElement($bookingUser)) {
            // set the owning side to null (unless already changed)
            if ($bookingUser->getUserBooking() === $this) {
                $bookingUser->setUserBooking(null);
            }
        }

        return $this;
    }
}
