<?php

namespace App\Service;

use App\Entity\Vehicle;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class VehicleBuilderService
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
    public function build(int $swapiId): Vehicle
    {
        $data = $this->resourceDownloaderService->download('vehicles', $swapiId);

        $vehicle = new Vehicle();

        $vehicle->setSwapiId(filter_var($data['url'], FILTER_SANITIZE_NUMBER_INT))
            ->setName($data['name'])
            ->setModel($data['model'])
            ->setVehicleClass($data['vehicle_class'])
            ->setManufacturer($data['manufacturer'])
            ->setLength($data['length'])
            ->setCostInCredits($data['cost_in_credits'])
            ->setCrew($data['crew'])
            ->setPassengers($data['passengers'])
            ->setMaxAtmospheringSpeed($data['max_atmosphering_speed'])
            ->setCargoCapacity($data['cargo_capacity'])
            ->setConsumables($data['consumables'])
            ->setCreated(new DateTimeImmutable($data['created']))
            ->setEdited(new DateTimeImmutable($data['edited']));

        $this->entityManager->persist($vehicle);
        $this->entityManager->flush();

        return $vehicle;
    }
}