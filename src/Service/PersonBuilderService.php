<?php

namespace App\Service;

use App\Entity\Person;
use App\Repository\FilmRepository;
use App\Repository\PlanetRepository;
use App\Repository\SpeciesRepository;
use App\Repository\StarshipRepository;
use App\Repository\VehicleRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class PersonBuilderService
{
    public function __construct(
        private readonly ResourceDownloaderService $resourceDownloaderService,
        private readonly EntityManagerInterface $entityManager,
        private readonly PlanetBuilderService $planetBuilderService,
        private readonly FilmBuilderService $filmBuilderService,
        private readonly SpeciesBuilderService $speciesBuilderService,
        private readonly VehicleBuilderService $vehicleBuilderService,
        private readonly StarshipBuilderService $starshipBuilderService,
        private readonly PlanetRepository $planetRepository,
        private readonly FilmRepository $filmRepository,
        private readonly SpeciesRepository $speciesRepository,
        private readonly VehicleRepository $vehicleRepository,
        private readonly StarshipRepository $starshipRepository
    ) {
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function build(int $swapiId): Person
    {
        $data = $this->resourceDownloaderService->download('people', $swapiId);

        $person = new Person();

        $person->setSwapiId(filter_var($data['url'], FILTER_SANITIZE_NUMBER_INT))
            ->setName($data['name'])
            ->setBirthYear($data['birth_year'])
            ->setEyeColor($data['eye_color'])
            ->setGender($data['gender'])
            ->setHairColor($data['hair_color'])
            ->setHeight($data['height'])
            ->setMass($data['mass'])
            ->setSkinColor($data['skin_color'])
            ->setCreated(new DateTimeImmutable($data['created']))
            ->setEdited(new DateTimeImmutable($data['edited']));

        $planetSwapiId = filter_var($data['homeworld'], FILTER_SANITIZE_NUMBER_INT);

        $planet = $this->planetRepository->findOneBy(['swapiId' => $planetSwapiId]) ??
            $this->planetBuilderService->build($planetSwapiId);

        $this->entityManager->persist($person);
        $this->entityManager->persist($planet);
        $planet->addPerson($person);

        foreach ($data['films'] as $film) {
            $filmSwapiId = filter_var($film, FILTER_SANITIZE_NUMBER_INT);

            $film = $this->filmRepository->findOneBy(['swapiId' => $filmSwapiId]) ??
                $this->filmBuilderService->build($filmSwapiId);

            $this->entityManager->persist($film);
            $film->addPerson($person);
        }

        foreach ($data['species'] as $species) {
            $speciesSwapiId = filter_var($species, FILTER_SANITIZE_NUMBER_INT);

            $species = $this->speciesRepository->findOneBy(['swapiId' => $speciesSwapiId]) ??
                $this->speciesBuilderService->build($speciesSwapiId);

            $this->entityManager->persist($species);
            $species->addPerson($person);
        }

        foreach ($data['vehicles'] as $vehicle) {
            $vehicleSwapiId = filter_var($vehicle, FILTER_SANITIZE_NUMBER_INT);

            $vehicle = $this->vehicleRepository->findOneBy(['swapiId' => $vehicleSwapiId]) ??
                $this->vehicleBuilderService->build($vehicleSwapiId);

            $this->entityManager->persist($vehicle);
            $vehicle->addPerson($person);
        }

        foreach ($data['starships'] as $starship) {
            $starshipSwapiId = filter_var($starship, FILTER_SANITIZE_NUMBER_INT);

            $starship = $this->starshipRepository->findOneBy(['swapiId' => $starshipSwapiId]) ??
                $this->starshipBuilderService->build($starshipSwapiId);

            $this->entityManager->persist($starship);
            $starship->addPerson($person);
        }

        $this->entityManager->flush();

        return $person;
    }
}