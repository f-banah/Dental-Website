<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FactureRepository::class)
 */
class Facture
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
    private $montant;

    /**
     * @ORM\OneToOne(targetEntity=Fiche::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $fiche;

    /**
     * @ORM\OneToMany(targetEntity=Paiement::class, mappedBy="factrue")
     */
    private $paiement;

    public function __construct()
    {
        $this->paiement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getFiche(): ?Fiche
    {
        return $this->fiche;
    }

    public function setFiche(Fiche $fiche): self
    {
        $this->fiche = $fiche;

        return $this;
    }

    /**
     * @return Collection|Paiement[]
     */
    public function getpaiement(): Collection
    {
        return $this->paiement;
    }

    public function addPaiement(Paiement $paiement): self
    {
        if (!$this->paiement->contains($paiement)) {
            $this->paiement[] = $paiement;
            $paiement->setFactrue($this);
        }

        return $this;
    }

    public function removePaiement(Paiement $paiement): self
    {
        if ($this->paiement->contains($paiement)) {
            $this->paiement->removeElement($paiement);
            // set the owning side to null (unless already changed)
            if ($paiement->getFactrue() === $this) {
                $paiement->setFactrue(null);
            }
        }

        return $this;
    }
}
