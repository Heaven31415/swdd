<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ResourceDownloaderService
{
    const STAR_WARS_API_URL = 'https://swapi.dev/api';

    private readonly Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @throws GuzzleException
     */
    public function download(string $resourceType, int $swapiId): array
    {
        $uri = self::STAR_WARS_API_URL.'/'.$resourceType.'/'.$swapiId;

        $response = $this->client->get($uri);

        return json_decode($response->getBody(), true);
    }
}