<?php

namespace App\Entity;

use App\Repository\CommandesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandesRepository::class)]
class Commandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Game::class, inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private $fknjeux;

    #[ORM\ManyToOne(targetEntity: Game::class, inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private $fkprix;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'commandes')]
    private $fkuser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFknjeux(): ?Game
    {
        return $this->fknjeux;
    }

    public function setFknjeux(?Game $fknjeux): self
    {
        $this->fknjeux = $fknjeux;

        return $this;
    }

    public function getFkuser(): ?User
    {
        return $this->fkuser;
    }

    public function setFkuser(?User $fkuser): self
    {
        $this->fkuser = $fkuser;

        return $this;
    }

    public function getFkprix(): ?Game
    {
        return $this->fkprix;
    }

    public function setFkprix(?Game $fkprix): self
    {
        $this->fkprix = $fkprix;

        return $this;
    }
}
