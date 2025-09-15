<?php

namespace App\Entity;

use App\Repository\TableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TableRepository::class)]
#[ORM\Table(name: '`table`')]
class Table
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numeroTable = null;

    #[ORM\Column]
    private ?int $nbPlaces = null;

    /**
     * @var Collection<int, Personne>
     */
    #[ORM\OneToMany(targetEntity: Personne::class, mappedBy: 'tables')]
    private Collection $Personne;

    public function __construct()
    {
        $this->Personne = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroTable(): ?int
    {
        return $this->numeroTable;
    }

    public function setNumeroTable(int $numeroTable): static
    {
        $this->numeroTable = $numeroTable;

        return $this;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nbPlaces;
    }

    public function setNbPlaces(int $nbPlaces): static
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    /**
     * @return Collection<int, Personne>
     */
    public function getPersonne(): Collection
    {
        return $this->Personne;
    }

    public function addPersonne(Personne $personne): static
    {
        if (!$this->Personne->contains($personne)) {
            $this->Personne->add($personne);
            $personne->setTables($this);
        }

        return $this;
    }

    public function removePersonne(Personne $personne): static
    {
        if ($this->Personne->removeElement($personne)) {
            // set the owning side to null (unless already changed)
            if ($personne->getTables() === $this) {
                $personne->setTables(null);
            }
        }

        return $this;
    }
}
