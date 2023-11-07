<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class ApiController extends AbstractController
{
    #[Route('/search', name: 'app_api_search')]
    public function search(): JsonResponse
    {
        return $this->json(['greeting' => 'Hello World!']);
    }
}
