<?php

namespace App\Entity;

use App\Repository\FicheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FicheRepository::class)
 */
class Fiche
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
    private $num_trait;

    /**
     * @ORM\OneToMany(targetEntity=Ligne::class, mappedBy="ligne")
     */
    private $ligne;

    /**
     * @ORM\OneToOne(targetEntity=Fiche::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $facture;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="fiche")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    public function __construct()
    {
        $this->ligne = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumTrait(): ?int
    {
        return $this->num_trait;
    }

    public function setNumTrait(int $num_trait): self
    {
        $this->num_trait = $num_trait;

        return $this;
    }

    /**
     * @return Collection|Ligne[]
     */
    public function getLigne(): Collection
    {
        return $this->ligne;
    }

    public function addLigne(Ligne $ligne): self
    {
        if (!$this->ligne->contains($ligne)) {
            $this->ligne[] = $ligne;
            $ligne->setFiche($this);
        }

        return $this;
    }

    public function removeLigne(Ligne $ligne): self
    {
        if ($this->ligne->contains($ligne)) {
            $this->ligne->removeElement($ligne);
            // set the owning side to null (unless already changed)
            if ($ligne->getFiche() === $this) {
                $ligne->setFiche(null);
            }
        }

        return $this;
    }

    public function getFacture(): ?self
    {
        return $this->facture;
    }

    public function setFacture(self $facture): self
    {
        $this->facture = $facture;

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
}
