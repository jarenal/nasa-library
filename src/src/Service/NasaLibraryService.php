<?php

namespace App\Service;


class NasaLibraryService
{
    private LibraryAdapter $libraryAdapter;

    public function __construct(LibraryAdapter $libraryAdapter)
    {
        $this->libraryAdapter = $libraryAdapter;
    }

    public function searchAssets(string $query, string $mediaType): array
    {
        return $this->libraryAdapter->search($query, $mediaType);
    }

    public function getAssetByNasaId(string $nasa_id): array
    {
        return $this->libraryAdapter->getAsset($nasa_id);
    }
}
