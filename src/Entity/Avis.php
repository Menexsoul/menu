<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\Column]
    private ?float $Notes = null;

    #[ORM\ManyToOne(inversedBy: 'laPersonne')]
    private ?Personne $MesAvis = null;

    #[ORM\ManyToOne(inversedBy: 'LePlat')]
    private ?Plat $LesAvis = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getNotes(): ?float
    {
        return $this->Notes;
    }

    public function setNotes(float $Notes): static
    {
        $this->Notes = $Notes;

        return $this;
    }

    public function getMesAvis(): ?Personne
    {
        return $this->MesAvis;
    }

    public function setMesAvis(?Personne $MesAvis): static
    {
        $this->MesAvis = $MesAvis;

        return $this;
    }

    public function getLesAvis(): ?Plat
    {
        return $this->LesAvis;
    }

    public function setLesAvis(?Plat $LesAvis): static
    {
        $this->LesAvis = $LesAvis;

        return $this;
    }
}
