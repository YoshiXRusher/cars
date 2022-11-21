<?php

namespace App\Entity;

use App\Repository\OptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OptionRepository::class)]
#[ORM\Table(name: '`option`')]
class Option
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'id_option', targetEntity: Carsoption::class)]
    private Collection $carsoptions;

    public function __construct()
    {
        $this->carsoptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $carsoption->setIdOption($this);
        }

        return $this;
    }

    public function removeCarsoption(Carsoption $carsoption): self
    {
        if ($this->carsoptions->removeElement($carsoption)) {
            // set the owning side to null (unless already changed)
            if ($carsoption->getIdOption() === $this) {
                $carsoption->setIdOption(null);
            }
        }

        return $this;
    }
}
