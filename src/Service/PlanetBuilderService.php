<?php

namespace App\Service;

use App\Entity\Planet;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class PlanetBuilderService
{
    public function __construct(
        private readonly ResourceDownloaderService $resourceDownloaderService,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function build(int $swapiId): Planet
    {
        $data = $this->resourceDownloaderService->download('planets', $swapiId);

        $planet = new Planet();

        $planet->setSwapiId(filter_var($data['url'], FILTER_SANITIZE_NUMBER_INT))
            ->setName($data['name'])
            ->setDiameter($data['diameter'])
            ->setRotationPeriod($data['rotation_period'])
            ->setOrbitalPeriod($data['orbital_period'])
            ->setGravity($data['gravity'])
            ->setPopulation($data['population'])
            ->setClimate($data['climate'])
            ->setTerrain($data['terrain'])
            ->setSurfaceWater($data['surface_water'])
            ->setCreated(new DateTimeImmutable($data['created']))
            ->setEdited(new DateTimeImmutable($data['edited']));

        $this->entityManager->persist($planet);
        $this->entityManager->flush();

        return $planet;
    }
}