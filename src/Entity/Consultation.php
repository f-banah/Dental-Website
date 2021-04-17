<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConsultationRepository::class)
 */
class Consultation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_consultation;

    /**
	 * @ORM\Column(type="time")
     */
    private $heure_consultation;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="consultation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

   /**
     * @ORM\OneToOne(targetEntity=Ordonnance::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ordonnance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateConsultation(): ?\DateTimeInterface
    {
        return $this->date_consultation;
    }

    public function setDateConsultation(\DateTimeInterface $date_consultation): self
    {
        $this->date_consultation = $date_consultation;

        return $this;
    }
    public function getHeureConsultation(): ?\DateTimeInterface
    {
        return $this->heure_consultation;
    }

    public function setHeureConsultation(\DateTimeInterface $heure_consultation): self
    {
        $this->heure_consultation = $heure_consultation;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }
    public function getOrdonnance(): ?Ordonnance
    {
        return $this->ordonnance;
    }

    public function setOrdonnance(Ordonnance $ordonnance): self
    {
        $this->ordonnance = $ordonnance;

        return $this;
    }

}
