<?php

namespace App\Controller;

use App\Service\NasaLibraryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class ApiController extends AbstractController
{
    #[Route('/search', name: 'app_api_search')]
    public function search(
        #[MapQueryParameter] string $query,
        #[MapQueryParameter] string $media_type,
        NasaLibraryService $libraryService
    ): JsonResponse {
        $result = $libraryService->searchAssets($query, $media_type);
        return $this->json($result);
    }

    #[Route('/asset/{nasa_id}', name: 'app_api_asset')]
    public function asset(string $nasa_id, NasaLibraryService $libraryService): JsonResponse
    {
        $result = $libraryService->getAssetByNasaId($nasa_id);
        return $this->json($result);
    }
}
