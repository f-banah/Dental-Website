<?php

namespace App\Entity;

use App\Repository\OrdonnanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdonnanceRepository::class)
 */
class Ordonnance
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
    private $medicament;

    /**
     * @ORM\Column(type="date")
     */
    private $date_ordonnance;

    /**
     * @ORM\OneToOne(targetEntity=Consultation::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $consultation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicament(): ?string
    {
        return $this->medicament;
    }

    public function setMedicament(string $medicament): self
    {
        $this->medicament = $medicament;

        return $this;
    }

    public function getDateOrdonnance(): ?\DateTimeInterface
    {
        return $this->date_ordonnance;
    }

    public function setDateOrdonnance(\DateTimeInterface $date_ordonnance): self
    {
        $this->date_ordonnance = $date_ordonnance;

        return $this;
    }

    public function getConsultation(): ?Consultation
    {
        return $this->consultation;
    }

    public function setConsultation(Consultation $consultation): self
    {
        $this->consultation = $consultation;

        return $this;
    }
}
