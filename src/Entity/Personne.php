<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
class Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mdp = null;

    #[ORM\ManyToOne(inversedBy: 'Personne')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Table $tables = null;

    /**
     * @var Collection<int, Avis>
     */
    #[ORM\OneToMany(targetEntity: Avis::class, mappedBy: 'MesAvis')]
    private Collection $laPersonne;

    public function __construct()
    {
        $this->laPersonne = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(?string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getTables(): ?Table
    {
        return $this->tables;
    }

    public function setTables(?Table $tables): static
    {
        $this->tables = $tables;

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getLaPersonne(): Collection
    {
        return $this->laPersonne;
    }

    public function addLaPersonne(Avis $laPersonne): static
    {
        if (!$this->laPersonne->contains($laPersonne)) {
            $this->laPersonne->add($laPersonne);
            $laPersonne->setMesAvis($this);
        }

        return $this;
    }

    public function removeLaPersonne(Avis $laPersonne): static
    {
        if ($this->laPersonne->removeElement($laPersonne)) {
            // set the owning side to null (unless already changed)
            if ($laPersonne->getMesAvis() === $this) {
                $laPersonne->setMesAvis(null);
            }
        }

        return $this;
    }
}
