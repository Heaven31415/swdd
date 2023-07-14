<?php

namespace App\Entity;

use App\Repository\StarshipRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StarshipRepository::class)]
#[ORM\Table(name: 'starships')]
class Starship
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
    private ?string $model = null;

    #[ORM\Column(length: 255)]
    private ?string $starshipClass = null;

    #[ORM\Column(length: 255)]
    private ?string $manufacturer = null;

    #[ORM\Column(length: 255)]
    private ?string $costInCredits = null;

    #[ORM\Column(length: 255)]
    private ?string $length = null;

    #[ORM\Column(length: 255)]
    private ?string $crew = null;

    #[ORM\Column(length: 255)]
    private ?string $passengers = null;

    #[ORM\Column(length: 255)]
    private ?string $maxAtmospheringSpeed = null;

    #[ORM\Column(length: 255)]
    private ?string $hyperdriveRating = null;

    #[ORM\Column(length: 255)]
    private ?string $MGLT = null;

    #[ORM\Column(length: 255)]
    private ?string $cargoCapacity = null;

    #[ORM\Column(length: 255)]
    private ?string $consumables = null;

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

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getStarshipClass(): ?string
    {
        return $this->starshipClass;
    }

    public function setStarshipClass(string $starshipClass): static
    {
        $this->starshipClass = $starshipClass;

        return $this;
    }

    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): static
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    public function getCostInCredits(): ?string
    {
        return $this->costInCredits;
    }

    public function setCostInCredits(string $costInCredits): static
    {
        $this->costInCredits = $costInCredits;

        return $this;
    }

    public function getLength(): ?string
    {
        return $this->length;
    }

    public function setLength(string $length): static
    {
        $this->length = $length;

        return $this;
    }

    public function getCrew(): ?string
    {
        return $this->crew;
    }

    public function setCrew(string $crew): static
    {
        $this->crew = $crew;

        return $this;
    }

    public function getPassengers(): ?string
    {
        return $this->passengers;
    }

    public function setPassengers(string $passengers): static
    {
        $this->passengers = $passengers;

        return $this;
    }

    public function getMaxAtmospheringSpeed(): ?string
    {
        return $this->maxAtmospheringSpeed;
    }

    public function setMaxAtmospheringSpeed(string $maxAtmospheringSpeed): static
    {
        $this->maxAtmospheringSpeed = $maxAtmospheringSpeed;

        return $this;
    }

    public function getHyperdriveRating(): ?string
    {
        return $this->hyperdriveRating;
    }

    public function setHyperdriveRating(string $hyperdriveRating): static
    {
        $this->hyperdriveRating = $hyperdriveRating;

        return $this;
    }

    public function getMGLT(): ?string
    {
        return $this->MGLT;
    }

    public function setMGLT(string $MGLT): static
    {
        $this->MGLT = $MGLT;

        return $this;
    }

    public function getCargoCapacity(): ?string
    {
        return $this->cargoCapacity;
    }

    public function setCargoCapacity(string $cargoCapacity): static
    {
        $this->cargoCapacity = $cargoCapacity;

        return $this;
    }

    public function getConsumables(): ?string
    {
        return $this->consumables;
    }

    public function setConsumables(string $consumables): static
    {
        $this->consumables = $consumables;

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
