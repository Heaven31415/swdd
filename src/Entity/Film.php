<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
#[ORM\Table(name: 'films')]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $swapiId = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $episodeId = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $openingCrawl = null;

    #[ORM\Column(length: 255)]
    private ?string $director = null;

    #[ORM\Column(length: 255)]
    private ?string $producer = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?DateTimeImmutable $releaseDate = null;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getEpisodeId(): ?int
    {
        return $this->episodeId;
    }

    public function setEpisodeId(int $episodeId): static
    {
        $this->episodeId = $episodeId;

        return $this;
    }

    public function getOpeningCrawl(): ?string
    {
        return $this->openingCrawl;
    }

    public function setOpeningCrawl(string $openingCrawl): static
    {
        $this->openingCrawl = $openingCrawl;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(string $director): static
    {
        $this->director = $director;

        return $this;
    }

    public function getProducer(): ?string
    {
        return $this->producer;
    }

    public function setProducer(string $producer): static
    {
        $this->producer = $producer;

        return $this;
    }

    public function getReleaseDate(): ?DateTimeImmutable
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(DateTimeImmutable $releaseDate): static
    {
        $this->releaseDate = $releaseDate;

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
