<?php

namespace App\Entity;

use App\Repository\SpeciesRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpeciesRepository::class)]
#[ORM\Table(name: 'species')]
class Species
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $swapiId = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $classification = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\Column(length: 255)]
    private ?string $averageHeight = null;

    #[ORM\Column(length: 255)]
    private ?string $averageLifespan = null;

    #[ORM\Column(length: 255)]
    private ?string $eyeColors = null;

    #[ORM\Column(length: 255)]
    private ?string $hairColors = null;

    #[ORM\Column(length: 255)]
    private ?string $skinColors = null;

    #[ORM\Column(length: 255)]
    private ?string $language = null;

    #[ORM\Column]
    private ?DateTimeImmutable $created = null;

    #[ORM\Column]
    private ?DateTimeImmutable $edited = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSwapiId(): ?int
    {
        return $this->swapiId;
    }

    public function setSwapiId(int $swapiId): static
    {
        $this->swapiId = $swapiId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getClassification(): ?string
    {
        return $this->classification;
    }

    public function setClassification(string $classification): static
    {
        $this->classification = $classification;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): static
    {
        $this->designation = $designation;

        return $this;
    }

    public function getAverageHeight(): ?string
    {
        return $this->averageHeight;
    }

    public function setAverageHeight(string $averageHeight): static
    {
        $this->averageHeight = $averageHeight;

        return $this;
    }

    public function getAverageLifespan(): ?string
    {
        return $this->averageLifespan;
    }

    public function setAverageLifespan(string $averageLifespan): static
    {
        $this->averageLifespan = $averageLifespan;

        return $this;
    }

    public function getEyeColors(): ?string
    {
        return $this->eyeColors;
    }

    public function setEyeColors(string $eyeColors): static
    {
        $this->eyeColors = $eyeColors;

        return $this;
    }

    public function getHairColors(): ?string
    {
        return $this->hairColors;
    }

    public function setHairColors(string $hairColors): static
    {
        $this->hairColors = $hairColors;

        return $this;
    }

    public function getSkinColors(): ?string
    {
        return $this->skinColors;
    }

    public function setSkinColors(string $skinColors): static
    {
        $this->skinColors = $skinColors;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function getCreated(): ?DateTimeImmutable
    {
        return $this->created;
    }

    public function setCreated(DateTimeImmutable $created): static
    {
        $this->created = $created;

        return $this;
    }

    public function getEdited(): ?DateTimeImmutable
    {
        return $this->edited;
    }

    public function setEdited(DateTimeImmutable $edited): static
    {
        $this->edited = $edited;

        return $this;
    }
}
