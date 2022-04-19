<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentsRepository::class)]
class Comments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $comment;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\Column(type: 'integer')]
    private $avis;

    #[ORM\ManyToOne(targetEntity: Game::class, inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private $fknjeu;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private $fkuser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAvis(): ?int
    {
        return $this->avis;
    }

    public function setAvis(int $avis): self
    {
        $this->avis = $avis;

        return $this;
    }

    public function getFknjeu(): ?Game
    {
        return $this->fknjeu;
    }

    public function setFknjeu(?Game $fknjeu): self
    {
        $this->fknjeu = $fknjeu;

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
}
