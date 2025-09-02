<?php

namespace App\Entity;

use App\Repository\CompanyMetaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompanyMetaRepository::class)]
class CompanyMeta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?array $about = null;

    #[ORM\Column]
    private array $contact = [];

    #[ORM\Column(nullable: true)]
    private ?array $team = null;

    #[ORM\Column(length: 64)]
    private ?string $iban = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAbout(): ?array
    {
        return $this->about;
    }

    public function setAbout(?array $about): static
    {
        $this->about = $about;

        return $this;
    }

    public function getContact(): array
    {
        return $this->contact;
    }

    public function setContact(array $contact): static
    {
        $this->contact = $contact;

        return $this;
    }

    public function getTeam(): ?array
    {
        return $this->team;
    }

    public function setTeam(?array $team): static
    {
        $this->team = $team;

        return $this;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(string $iban): static
    {
        $this->iban = $iban;

        return $this;
    }
}
