<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient 
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit faire minimum 6 caractères")
     */
    private $pwd;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\OneToMany(targetEntity=Consultation::class, mappedBy="patient")
     */
    private $consultation;

    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\OneToOne(targetEntity=Document::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    public $document=0;

    /**
     * @ORM\OneToMany(targetEntity=Fiche::class, mappedBy="patient")
     */
    private $fiche;

    public function __construct()
    {
        $this->consultation = new ArrayCollection();
        $this->fiche = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPwd(): ?string
    {
        return $this->pwd;
    }

    public function setPwd(string $pwd): self
    {
        $this->pwd = $pwd;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection|Consultation[]
     */
    public function getConsultation(): Collection
    {
        return $this->consultation;
    }

    public function addConsultation(Consultation $consultation): self
    {
        if (!$this->consultation->contains($consultation)) {
            $this->consultation[] = $consultation;
            $consultation->setPatient($this);
        }

        return $this;
    }

    public function removeConsultation(Consultation $consultation): self
    {
        if ($this->consultation->contains($consultation)) {
            $this->consultation->removeElement($consultation);
            // set the owning side to null (unless already changed)
            if ($consultation->getPatient() === $this) {
                $consultation->setPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Fiche[]
     */
    public function getFiche(): Collection
    {
        return $this->fiche;
    }

    public function addFiche(Fiche $fiche): self
    {
        if (!$this->fiche->contains($fiche)) {
            $this->fiche[] = $fiche;
            $fiche->setPatient($this);
        }

        return $this;
    }

    public function removeFiche(Fiche $fiche): self
    {
        if ($this->fiche->contains($fiche)) {
            $this->fiche->removeElement($fiche);
            // set the owning side to null (unless already changed)
            if ($fiche->getPatient() === $this) {
                $fiche->setPatient(null);
            }
        }

        return $this;
    }

    public function getDocument(): ?int
    {
        return $this->document;
    }

    public function setDocument(int $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function eraseCredentials(){}

    public function getSalt(){}


}
