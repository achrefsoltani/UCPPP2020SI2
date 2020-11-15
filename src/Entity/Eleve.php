<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EleveRepository::class)
 */
class Eleve
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Type("string")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Type("string")
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     * @Assert\Date
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type("integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Type("string")
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type("integer")
     */
    private $numTel;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Type("string")
     */
    private $lieuNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Choice({"Homme", "Femme"})
     */
    private $sexe;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type("integer")
     */
    private $cin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Type("string")
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Type("string")
     */
    private $mdp;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Note::class, mappedBy="Eleve")
     */
    private $notes;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class, inversedBy="eleves")
     */
    private $Classe;

    /**
     * @ORM\ManyToOne(targetEntity=Emploi::class, inversedBy="eleves")
     */
    private $Emploi;

    /**
     * @ORM\OneToMany(targetEntity=AbsenceEleve::class, mappedBy="eleve")
     */
    private $AbsenceEleve;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type('integer)
     */
    private $niveau;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->AbsenceEleve = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumTel(): ?int
    {
        return $this->numTel;
    }

    public function setNumTel(int $numTel): self
    {
        $this->numTel = $numTel;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setEleve($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getEleve() === $this) {
                $note->setEleve(null);
            }
        }

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->Classe;
    }

    public function setClasse(?Classe $Classe): self
    {
        $this->Classe = $Classe;

        return $this;
    }

    public function getEmploi(): ?Emploi
    {
        return $this->Emploi;
    }

    public function setEmploi(?Emploi $Emploi): self
    {
        $this->Emploi = $Emploi;

        return $this;
    }

    /**
     * @return Collection|AbsenceEleve[]
     */
    public function getAbsenceEleve(): Collection
    {
        return $this->AbsenceEleve;
    }

    public function addAbsenceEleve(AbsenceEleve $absenceEleve): self
    {
        if (!$this->AbsenceEleve->contains($absenceEleve)) {
            $this->AbsenceEleve[] = $absenceEleve;
            $absenceEleve->setEleve($this);
        }

        return $this;
    }

    public function removeAbsenceEleve(AbsenceEleve $absenceEleve): self
    {
        if ($this->AbsenceEleve->removeElement($absenceEleve)) {
            // set the owning side to null (unless already changed)
            if ($absenceEleve->getEleve() === $this) {
                $absenceEleve->setEleve(null);
            }
        }

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }
}
