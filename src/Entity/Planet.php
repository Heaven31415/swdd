<?php

namespace App\Entity;

use App\Repository\PlanetRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanetRepository::class)]
#[ORM\Table(name: 'planets')]
class Planet
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
    private ?string $diameter = null;

    #[ORM\Column(length: 255)]
    private ?string $rotationPeriod = null;

    #[ORM\Column(length: 255)]
    private ?string $orbitalPeriod = null;

    #[ORM\Column(length: 255)]
    private ?string $gravity = null;

    #[ORM\Column(length: 255)]
    private ?string $population = null;

    #[ORM\Column(length: 255)]
    private ?string $climate = null;

    #[ORM\Column(length: 255)]
    private ?string $terrain = null;

    #[ORM\Column(length: 255)]
    private ?string $surfaceWater = null;

    #[ORM\Column]
    private ?DateTimeImmutable $created = null;

    #[ORM\Column]
    private ?DateTimeImmutable $edited = null;

    #[ORM\OneToMany(mappedBy: 'homeworld', targetEntity: Person::class, orphanRemoval: true)]
    private Collection $people;

    public function __construct()
    {
        $this->people = new ArrayCollection();
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

    public function getDiameter(): ?string
    {
        return $this->diameter;
    }

    public function setDiameter(string $diameter): static
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getRotationPeriod(): ?string
    {
        return $this->rotationPeriod;
    }

    public function setRotationPeriod(string $rotationPeriod): static
    {
        $this->rotationPeriod = $rotationPeriod;

        return $this;
    }

    public function getOrbitalPeriod(): ?string
    {
        return $this->orbitalPeriod;
    }

    public function setOrbitalPeriod(string $orbitalPeriod): static
    {
        $this->orbitalPeriod = $orbitalPeriod;

        return $this;
    }

    public function getGravity(): ?string
    {
        return $this->gravity;
    }

    public function setGravity(string $gravity): static
    {
        $this->gravity = $gravity;

        return $this;
    }

    public function getPopulation(): ?string
    {
        return $this->population;
    }

    public function setPopulation(string $population): static
    {
        $this->population = $population;

        return $this;
    }

    public function getClimate(): ?string
    {
        return $this->climate;
    }

    public function setClimate(string $climate): static
    {
        $this->climate = $climate;

        return $this;
    }

    public function getTerrain(): ?string
    {
        return $this->terrain;
    }

    public function setTerrain(string $terrain): static
    {
        $this->terrain = $terrain;

        return $this;
    }

    public function getSurfaceWater(): ?string
    {
        return $this->surfaceWater;
    }

    public function setSurfaceWater(string $surfaceWater): static
    {
        $this->surfaceWater = $surfaceWater;

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

    /**
     * @return Collection<int, Person>
     */
    public function getPeople(): Collection
    {
        return $this->people;
    }

    public function addPerson(Person $person): static
    {
        if (!$this->people->contains($person)) {
            $this->people->add($person);
            $person->setHomeworld($this);
        }

        return $this;
    }

    public function removePerson(Person $person): static
    {
        if ($this->people->removeElement($person)) {
            // set the owning side to null (unless already changed)
            if ($person->getHomeworld() === $this) {
                $person->setHomeworld(null);
            }
        }

        return $this;
    }
}
