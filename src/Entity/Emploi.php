<?php

namespace App\Entity;

use App\Repository\EmploiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmploiRepository::class)
 */
class Emploi
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $heureDebut;

    /**
     * @ORM\Column(type="time")
     */
    private $heureFin;

    /**
     * @ORM\OneToMany(targetEntity=Eleve::class, mappedBy="Emploi")
     */
    private $eleves;

    /**
     * @ORM\OneToMany(targetEntity=Enseignant::class, mappedBy="Emploi")
     */
    private $enseignants;

    /**
     * @ORM\ManyToMany(targetEntity=Salle::class, inversedBy="emplois")
     */
    private $Salle;

    /**
     * @ORM\ManyToMany(targetEntity=Matiere::class, inversedBy="emplois")
     */
    private $Matiere;

    public function __construct()
    {
        $this->eleves = new ArrayCollection();
        $this->enseignants = new ArrayCollection();
        $this->Salle = new ArrayCollection();
        $this->Matiere = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * @return Collection|Eleve[]
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addElefe(Eleve $elefe): self
    {
        if (!$this->eleves->contains($elefe)) {
            $this->eleves[] = $elefe;
            $elefe->setEmploi($this);
        }

        return $this;
    }

    public function removeElefe(Eleve $elefe): self
    {
        if ($this->eleves->removeElement($elefe)) {
            // set the owning side to null (unless already changed)
            if ($elefe->getEmploi() === $this) {
                $elefe->setEmploi(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Enseignant[]
     */
    public function getEnseignants(): Collection
    {
        return $this->enseignants;
    }

    public function addEnseignant(Enseignant $enseignant): self
    {
        if (!$this->enseignants->contains($enseignant)) {
            $this->enseignants[] = $enseignant;
            $enseignant->setEmploi($this);
        }

        return $this;
    }

    public function removeEnseignant(Enseignant $enseignant): self
    {
        if ($this->enseignants->removeElement($enseignant)) {
            // set the owning side to null (unless already changed)
            if ($enseignant->getEmploi() === $this) {
                $enseignant->setEmploi(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Salle[]
     */
    public function getSalle(): Collection
    {
        return $this->Salle;
    }

    public function addSalle(Salle $salle): self
    {
        if (!$this->Salle->contains($salle)) {
            $this->Salle[] = $salle;
        }

        return $this;
    }

    public function removeSalle(Salle $salle): self
    {
        $this->Salle->removeElement($salle);

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getMatiere(): Collection
    {
        return $this->Matiere;
    }

    public function addMatiere(Matiere $matiere): self
    {
        if (!$this->Matiere->contains($matiere)) {
            $this->Matiere[] = $matiere;
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): self
    {
        $this->Matiere->removeElement($matiere);

        return $this;
    }
}
