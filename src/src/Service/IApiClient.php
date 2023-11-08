<?php

namespace App\Service;

interface IApiClient
{
    public function search(string $query, string $mediaType): array;

    public function getAsset(string $nasa_id): array;
}
