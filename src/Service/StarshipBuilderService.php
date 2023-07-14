<?php

namespace App\Service;

use App\Entity\Starship;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class StarshipBuilderService
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
    public function build(int $swapiId): Starship
    {
        $data = $this->resourceDownloaderService->download('starships', $swapiId);

        $starship = new Starship();

        $starship->setSwapiId(filter_var($data['url'], FILTER_SANITIZE_NUMBER_INT))
            ->setName($data['name'])
            ->setModel($data['model'])
            ->setStarshipClass($data['starship_class'])
            ->setManufacturer($data['manufacturer'])
            ->setCostInCredits($data['cost_in_credits'])
            ->setLength($data['length'])
            ->setCrew($data['crew'])
            ->setPassengers($data['passengers'])
            ->setMaxAtmospheringSpeed($data['max_atmosphering_speed'])
            ->setHyperdriveRating($data['hyperdrive_rating'])
            ->setMGLT($data['MGLT'])
            ->setCargoCapacity($data['cargo_capacity'])
            ->setConsumables($data['consumables'])
            ->setCreated(new DateTimeImmutable($data['created']))
            ->setEdited(new DateTimeImmutable($data['edited']));

        $this->entityManager->persist($starship);
        $this->entityManager->flush();

        return $starship;
    }
}