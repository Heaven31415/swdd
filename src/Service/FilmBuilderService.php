<?php

namespace App\Service;

use App\Entity\Film;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class FilmBuilderService
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
    public function build(int $swapiId): Film
    {
        $data = $this->resourceDownloaderService->download('films', $swapiId);

        $film = new Film();

        $film->setSwapiId(filter_var($data['url'], FILTER_SANITIZE_NUMBER_INT))
            ->setTitle($data['title'])
            ->setEpisodeId($data['episode_id'])
            ->setOpeningCrawl($data['opening_crawl'])
            ->setDirector($data['director'])
            ->setProducer($data['producer'])
            ->setReleaseDate(new DateTimeImmutable($data['release_date']))
            ->setCreated(new DateTimeImmutable($data['created']))
            ->setEdited(new DateTimeImmutable($data['edited']));

        $this->entityManager->persist($film);
        $this->entityManager->flush();

        return $film;
    }
}