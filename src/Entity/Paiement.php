<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaiementRepository::class)
 */
class Paiement
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
    private $mode_paie;

    /**
     * @ORM\ManyToOne(targetEntity=Facture::class, inversedBy="paiements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $factrue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModePaie(): ?string
    {
        return $this->mode_paie;
    }

    public function setModePaie(string $mode_paie): self
    {
        $this->mode_paie = $mode_paie;

        return $this;
    }

    public function getFactrue(): ?Facture
    {
        return $this->factrue;
    }

    public function setFactrue(?Facture $factrue): self
    {
        $this->factrue = $factrue;

        return $this;
    }
}
