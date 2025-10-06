<?php

namespace App\Entity;

use App\Repository\PlatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlatRepository::class)]
class Plat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\ManyToOne(inversedBy: 'repas')]
    private ?CategoriePlat $macategorie = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    /**
     * @var Collection<int, Avis>
     */
    #[ORM\OneToMany(targetEntity: Avis::class, mappedBy: 'LesAvis')]
    private Collection $LePlat;

    public function __construct()
    {
        $this->LePlat = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getMacategorie(): ?CategoriePlat
    {
        return $this->macategorie;
    }

    public function setMacategorie(?CategoriePlat $macategorie): static
    {
        $this->macategorie = $macategorie;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getLePlat(): Collection
    {
        return $this->LePlat;
    }

    public function addLePlat(Avis $lePlat): static
    {
        if (!$this->LePlat->contains($lePlat)) {
            $this->LePlat->add($lePlat);
            $lePlat->setLesAvis($this);
        }

        return $this;
    }

    public function removeLePlat(Avis $lePlat): static
    {
        if ($this->LePlat->removeElement($lePlat)) {
            // set the owning side to null (unless already changed)
            if ($lePlat->getLesAvis() === $this) {
                $lePlat->setLesAvis(null);
            }
        }

        return $this;
    }
}
