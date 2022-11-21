<?php

namespace App\Entity;

use App\Repository\DescriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DescriptionRepository::class)]
class Description
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $kilometrage = null;

    #[ORM\Column(length: 100)]
    private ?string $marque = null;

    #[ORM\Column(length: 100)]
    private ?string $modele = null;

    #[ORM\Column]
    private ?int $cylindree = null;

    #[ORM\Column]
    private ?int $puissance = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $nb_proprio = null;

    #[ORM\Column(length: 15)]
    private ?string $carburant = null;

    #[ORM\Column(length: 15)]
    private ?string $transmition = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\OneToMany(mappedBy: 'id_desc', targetEntity: Carsoption::class)]
    private Collection $carsoptions;

    public function __construct()
    {
        $this->carsoptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getCylindree(): ?int
    {
        return $this->cylindree;
    }

    public function setCylindree(int $cylindree): self
    {
        $this->cylindree = $cylindree;

        return $this;
    }

    public function getPuissance(): ?int
    {
        return $this->puissance;
    }

    public function setPuissance(int $puissance): self
    {
        $this->puissance = $puissance;

        return $this;
    }

    public function getNbProprio(): ?int
    {
        return $this->nb_proprio;
    }

    public function setNbProprio(int $nb_proprio): self
    {
        $this->nb_proprio = $nb_proprio;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(string $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getTransmition(): ?string
    {
        return $this->transmition;
    }

    public function setTransmition(string $transmition): self
    {
        $this->transmition = $transmition;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, Carsoption>
     */
    public function getCarsoptions(): Collection
    {
        return $this->carsoptions;
    }

    public function addCarsoption(Carsoption $carsoption): self
    {
        if (!$this->carsoptions->contains($carsoption)) {
            $this->carsoptions->add($carsoption);
            $carsoption->setIdDesc($this);
        }

        return $this;
    }

    public function removeCarsoption(Carsoption $carsoption): self
    {
        if ($this->carsoptions->removeElement($carsoption)) {
            // set the owning side to null (unless already changed)
            if ($carsoption->getIdDesc() === $this) {
                $carsoption->setIdDesc(null);
            }
        }

        return $this;
    }
}
