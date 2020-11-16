<?php

namespace App\Entity;

use App\Repository\EnseignantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use libphonenumber\PhoneNumberType;
use Symfony\Component\Validator\Constraints as Assert;
use Adamski\Symfony\PhoneNumberBundle\Model\PhoneNumber;
use Adamski\Symfony\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;



/**
 * @ORM\Entity(repositoryClass=EnseignantRepository::class)
 */
class Enseignant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="vous devez saisir un nom")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="vous devez saisir un prenom")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="integer")
     *@Assert\Range(min=25,max=70,
     *     minMessage="vous ne pouvez pas avoir un age inferieur a un ans",
     *     maxMessage="si vous avez plus de 70 vous etes en retraite ")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="phone_number")
     * @Assert\NotBlank()
     */
    private $numTel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieuNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="vous devez entrer un nombre de 8 chiffres")
     */
    private $cin;

    /**
     * @ORM\Column(type="string", length=255 ,nullable=true)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $mdp;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email( message = "The email '{{ value }}' is not a valid email."
     * )
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=AbsenceEnseignant::class, mappedBy="enseignant")
     */
    private $AbsenceEnseignant;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class, inversedBy="enseignants")
     */
    private $Matiere;

    /**
     * @ORM\ManyToOne(targetEntity=Emploi::class, inversedBy="enseignants")
     */
    private $Emploi;

    public function __construct()
    {
        $this->AbsenceEnseignant = new ArrayCollection();
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

    public function getNumTel(): ?PhoneNumber
    {
        return $this->numTel;
    }

    public function setNumTel(PhoneNumber $numTel): self
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
     * @return Collection|AbsenceEnseignant[]
     */
    public function getAbsenceEnseignant(): Collection
    {
        return $this->AbsenceEnseignant;
    }

    public function addAbsenceEnseignant(AbsenceEnseignant $absenceEnseignant): self
    {
        if (!$this->AbsenceEnseignant->contains($absenceEnseignant)) {
            $this->AbsenceEnseignant[] = $absenceEnseignant;
            $absenceEnseignant->setEnseignant($this);
        }

        return $this;
    }

    public function removeAbsenceEnseignant(AbsenceEnseignant $absenceEnseignant): self
    {
        if ($this->AbsenceEnseignant->removeElement($absenceEnseignant)) {
            // set the owning side to null (unless already changed)
            if ($absenceEnseignant->getEnseignant() === $this) {
                $absenceEnseignant->setEnseignant(null);
            }
        }

        return $this;
    }

    public function getMatiere(): ?Matiere
    {
        return $this->Matiere;
    }

    public function setMatiere(?Matiere $Matiere): self
    {
        $this->Matiere = $Matiere;

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
    public function __toString():?string
    {
        return $this->getAdresse();
    }

}
