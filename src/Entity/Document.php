<?php

namespace App\Entity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use App\Repository\DocumentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentRepository::class)
 * @UniqueEntity("numDossier")
 */
class Document
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    public $numDossier;

    /**
     * @ORM\Column(type="integer")
     * @ORM\OneToOne(targetEntity=patient::class, cascade={"persist", "remove"})
     *  @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?patient
    {
        return $this->patient;
    }

    public function setPatient(patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function __toString()
    {
        return $this->num_dossier;
    }

    public function getNumDossier(): ?int
    {
        return $this->num_dossier;
    }

    public function setNumDossier(int $numDossier): self
    {
        $this->numDossier = $numDossier;

        return $this;
    }


}
