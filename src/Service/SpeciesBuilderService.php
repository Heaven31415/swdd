<?php

namespace App\Service;

use App\Entity\Species;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class SpeciesBuilderService
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
    public function build(int $swapiId): Species
    {
        $data = $this->resourceDownloaderService->download('species', $swapiId);

        $species = new Species();

        $species->setSwapiId(filter_var($data['url'], FILTER_SANITIZE_NUMBER_INT))
            ->setName($data['name'])
            ->setClassification($data['classification'])
            ->setDesignation($data['designation'])
            ->setAverageHeight($data['average_height'])
            ->setAverageLifespan($data['average_lifespan'])
            ->setEyeColors($data['eye_colors'])
            ->setHairColors($data['hair_colors'])
            ->setSkinColors($data['skin_colors'])
            ->setLanguage($data['language'])
            ->setCreated(new DateTimeImmutable($data['created']))
            ->setEdited(new DateTimeImmutable($data['edited']));

        $this->entityManager->persist($species);
        $this->entityManager->flush();

        return $species;
    }
}