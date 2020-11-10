<?php

namespace App\Entity;

use App\Repository\AbsenceEnseignantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AbsenceEnseignantRepository::class)
 */
class AbsenceEnseignant
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
     * @ORM\Column(type="date")
     */
    private $dateAbsence;

    /**
     * @ORM\Column(type="boolean")
     */
    private $justifie;

    /**
     * @ORM\ManyToOne(targetEntity=Enseignant::class, inversedBy="AbsenceEnseignant")
     */
    private $enseignant;

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

    public function getDateAbsence(): ?\DateTimeInterface
    {
        return $this->dateAbsence;
    }

    public function setDateAbsence(\DateTimeInterface $dateAbsence): self
    {
        $this->dateAbsence = $dateAbsence;

        return $this;
    }

    public function getJustifie(): ?bool
    {
        return $this->justifie;
    }

    public function setJustifie(bool $justifie): self
    {
        $this->justifie = $justifie;

        return $this;
    }

    public function getEnseignant(): ?Enseignant
    {
        return $this->enseignant;
    }

    public function setEnseignant(?Enseignant $enseignant): self
    {
        $this->enseignant = $enseignant;

        return $this;
    }
}
