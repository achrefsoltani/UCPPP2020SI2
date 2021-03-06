<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=SalleRepository::class)
 */
class Salle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     *  @Assert\NotBlank(message="vous devez saisir le numéro de la salle ")
     */
    private $numero;

    /**
     * @ORM\Column(type="integer")
     *  @Assert\NotBlank(message="vous devez saisir la capacité de la salle ")
     * @Assert\Range(min="20", max="35", minMessage="la salle peut contenir plus que  20 ", maxMessage="la salle ne peut contenir plus que  35 ")

     */
    private $capacite;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="vous devez spécifier le type de la salle ")
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity=Emploi::class, mappedBy="Salle")
     */
    private $emplois;

    public function __construct()
    {
        $this->emplois = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Emploi[]
     */
    public function getEmplois(): Collection
    {
        return $this->emplois;
    }

    public function addEmploi(Emploi $emploi): self
    {
        if (!$this->emplois->contains($emploi)) {
            $this->emplois[] = $emploi;
            $emploi->addSalle($this);
        }

        return $this;
    }

    public function removeEmploi(Emploi $emploi): self
    {
        if ($this->emplois->removeElement($emploi)) {
            $emploi->removeSalle($this);
        }

        return $this;
    }
}
