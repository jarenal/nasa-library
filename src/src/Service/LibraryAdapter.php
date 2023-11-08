<?php

namespace App\Service;

class LibraryAdapter
{
    private IApiClient $apiClient;

    public function __construct(IApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function search(string $query, string $mediaType): array
    {
        return $this->apiClient->search($query, $mediaType);
    }

    public function getAsset(string $nasa_id): array
    {
        return $this->apiClient->getAsset($nasa_id);
    }
}
