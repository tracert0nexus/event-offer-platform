<?php

declare(strict_types=1);

namespace App\Controller\App;

use App\Repository\CompanyMetaRepository;
use App\Repository\ReferenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServiceController extends AbstractController
{
    #[Route('/services', name: 'app_service')]
    public function index(ReferenceRepository $referenceRepository, CompanyMetaRepository $companyMetaRepository): Response
    {
        return $this->render('app/service.html.twig', [
            'companyMeta' => $companyMetaRepository->getCompanyMeta(),
            'references' => $referenceRepository->findPublicWithMedia()
        ]);
    }
}
