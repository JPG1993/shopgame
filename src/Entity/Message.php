<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $message;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\ManyToOne(targetEntity: Sujet::class, inversedBy: 'messages')]
    #[ORM\JoinColumn(nullable: false)]
    private $fksujet;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'messages')]
    #[ORM\JoinColumn(nullable: false)]
    private $fkuser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

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

    public function getFksujet(): ?Sujet
    {
        return $this->fksujet;
    }

    public function setFksujet(?Sujet $fksujet): self
    {
        $this->fksujet = $fksujet;

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
