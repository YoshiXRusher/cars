<?php

namespace App\Entity;

use App\Repository\CarsoptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarsoptionRepository::class)]
class Carsoption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'carsoptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Description $id_desc = null;

    #[ORM\ManyToOne(inversedBy: 'carsoptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Option $id_option = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDesc(): ?Description
    {
        return $this->id_desc;
    }

    public function setIdDesc(?Description $id_desc): self
    {
        $this->id_desc = $id_desc;

        return $this;
    }

    public function getIdOption(): ?Option
    {
        return $this->id_option;
    }

    public function setIdOption(?Option $id_option): self
    {
        $this->id_option = $id_option;

        return $this;
    }
}
