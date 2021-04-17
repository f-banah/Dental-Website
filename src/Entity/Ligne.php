<?php

namespace App\Entity;

use App\Repository\LigneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LigneRepository::class)
 */
class Ligne
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
    private $type_trait;

    /**
     * @ORM\Column(type="datetime")
     */
    private $temp_traitement;

    /**
     * @ORM\ManyToOne(targetEntity=Fiche::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $fiche;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeTrait(): ?string
    {
        return $this->type_trait;
    }

    public function setTypeTrait(string $type_trait): self
    {
        $this->type_trait = $type_trait;

        return $this;
    }

    public function getTempTraitement(): ?\DateTimeInterface
    {
        return $this->temp_traitement;
    }

    public function setTempTraitement(\DateTimeInterface $temp_traitement): self
    {
        $this->temp_traitement = $temp_traitement;

        return $this;
    }

    public function getFiche(): ?Fiche
    {
        return $this->fiche;
    }

    public function setFiche(?Fiche $fiche): self
    {
        $this->fiche = $fiche;

        return $this;
    }


}
