<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
#[ORM\Table(name: 'people')]
class Person
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
    private ?string $birthYear = null;

    #[ORM\Column(length: 255)]
    private ?string $eyeColor = null;

    #[ORM\Column(length: 255)]
    private ?string $gender = null;

    #[ORM\Column(length: 255)]
    private ?string $hairColor = null;

    #[ORM\Column(length: 255)]
    private ?string $height = null;

    #[ORM\Column(length: 255)]
    private ?string $mass = null;

    #[ORM\Column(length: 255)]
    private ?string $skinColor = null;

    #[ORM\Column]
    private ?DateTimeImmutable $created = null;

    #[ORM\Column]
    private ?DateTimeImmutable $edited = null;

    #[ORM\ManyToOne(inversedBy: 'people')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Planet $homeworld = null;

    #[ORM\ManyToMany(targetEntity: Film::class, inversedBy: 'people')]
    private Collection $films;

    #[ORM\ManyToMany(targetEntity: Species::class, inversedBy: 'people')]
    private Collection $species;

    #[ORM\ManyToMany(targetEntity: Vehicle::class, inversedBy: 'people')]
    private Collection $vehicles;

    #[ORM\ManyToMany(targetEntity: Starship::class, inversedBy: 'people')]
    private Collection $starships;

    public function __construct()
    {
        $this->films = new ArrayCollection();
        $this->species = new ArrayCollection();
        $this->vehicles = new ArrayCollection();
        $this->starships = new ArrayCollection();
    }

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

    public function getBirthYear(): ?string
    {
        return $this->birthYear;
    }

    public function setBirthYear(string $birthYear): static
    {
        $this->birthYear = $birthYear;

        return $this;
    }

    public function getEyeColor(): ?string
    {
        return $this->eyeColor;
    }

    public function setEyeColor(string $eyeColor): static
    {
        $this->eyeColor = $eyeColor;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getHairColor(): ?string
    {
        return $this->hairColor;
    }

    public function setHairColor(string $hairColor): static
    {
        $this->hairColor = $hairColor;

        return $this;
    }

    public function getHeight(): ?string
    {
        return $this->height;
    }

    public function setHeight(string $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getMass(): ?string
    {
        return $this->mass;
    }

    public function setMass(string $mass): static
    {
        $this->mass = $mass;

        return $this;
    }

    public function getSkinColor(): ?string
    {
        return $this->skinColor;
    }

    public function setSkinColor(string $skinColor): static
    {
        $this->skinColor = $skinColor;

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

    public function getHomeworld(): ?Planet
    {
        return $this->homeworld;
    }

    public function setHomeworld(?Planet $homeworld): static
    {
        $this->homeworld = $homeworld;

        return $this;
    }

    /**
     * @return Collection<int, Film>
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }

    public function addFilm(Film $film): static
    {
        if (!$this->films->contains($film)) {
            $this->films->add($film);
        }

        return $this;
    }

    public function removeFilm(Film $film): static
    {
        $this->films->removeElement($film);

        return $this;
    }

    /**
     * @return Collection<int, Species>
     */
    public function getSpecies(): Collection
    {
        return $this->species;
    }

    public function addSpecies(Species $species): static
    {
        if (!$this->species->contains($species)) {
            $this->species->add($species);
        }

        return $this;
    }

    public function removeSpecies(Species $species): static
    {
        $this->species->removeElement($species);

        return $this;
    }

    /**
     * @return Collection<int, Vehicle>
     */
    public function getVehicles(): Collection
    {
        return $this->vehicles;
    }

    public function addVehicle(Vehicle $vehicle): static
    {
        if (!$this->vehicles->contains($vehicle)) {
            $this->vehicles->add($vehicle);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): static
    {
        $this->vehicles->removeElement($vehicle);

        return $this;
    }

    /**
     * @return Collection<int, Starship>
     */
    public function getStarships(): Collection
    {
        return $this->starships;
    }

    public function addStarship(Starship $starship): static
    {
        if (!$this->starships->contains($starship)) {
            $this->starships->add($starship);
        }

        return $this;
    }

    public function removeStarship(Starship $starship): static
    {
        $this->starships->removeElement($starship);

        return $this;
    }
}
