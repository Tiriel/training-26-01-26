<?php

namespace App\Search\Client;

use App\Search\Interface\ConferenceSearchInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiConferenceSearch implements ConferenceSearchInterface
{
    public function __construct(
        protected readonly HttpClientInterface $conferencesClient,
    ) {}

    public function searchByName(?string $name = null): array
    {
        return $this->conferencesClient->request('GET', '/events', [
            'query' => ['name' => $name],
        ])->toArray();
    }
}
