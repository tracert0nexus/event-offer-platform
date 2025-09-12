<?php

namespace App\Entity;

use App\Repository\CompanyMetaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(length: 255)]
    private ?string $ownerName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ownerStreet = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ownerCity = null;

    #[ORM\Column(length: 255)]
    private ?string $ownerEmail = null;

    #[ORM\Column(length: 255)]
    private ?string $companyName = null;

    #[ORM\Column(length: 255)]
    private ?string $companySlogan = null;

    #[ORM\Column(length: 255)]
    private ?string $coreService = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\OneToMany(targetEntity: Media::class, mappedBy: 'companyMeta', cascade: ['persist'])]
    private Collection $media;

    public function __construct()
    {
        $this->media = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getOwnerName(): ?string
    {
        return $this->ownerName;
    }

    public function setOwnerName(string $ownerName): static
    {
        $this->ownerName = $ownerName;

        return $this;
    }

    public function getOwnerStreet(): ?string
    {
        return $this->ownerStreet;
    }

    public function setOwnerStreet(string $ownerStreet): static
    {
        $this->ownerStreet = $ownerStreet;

        return $this;
    }

    public function getOwnerCity(): ?string
    {
        return $this->ownerCity;
    }

    public function setOwnerCity(?string $ownerCity): static
    {
        $this->ownerCity = $ownerCity;

        return $this;
    }

    public function getOwnerEmail(): ?string
    {
        return $this->ownerEmail;
    }

    public function setOwnerEmail(string $ownerEmail): static
    {
        $this->ownerEmail = $ownerEmail;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): static
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getCompanySlogan(): ?string
    {
        return $this->companySlogan;
    }

    public function setCompanySlogan(string $companySlogan): static
    {
        $this->companySlogan = $companySlogan;

        return $this;
    }

    public function getCoreService(): ?string
    {
        return $this->coreService;
    }

    public function setCoreService(string $coreService): static
    {
        $this->coreService = $coreService;

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): static
    {
        if (!$this->media->contains($medium)) {
            $this->media->add($medium);
            $medium->setCompanyMeta($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): static
    {
        if ($this->media->removeElement($medium)) {
            // set the owning side to null (unless already changed)
            if ($medium->getCompanyMeta() === $this) {
                $medium->setCompanyMeta(null);
            }
        }

        return $this;
    }
}
