<?php

namespace App\Controller\App;

use App\Repository\CompanyMetaRepository;
use App\Repository\ReferenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ReferenceController extends AbstractController
{
    #[Route('/reference', name: 'app_reference')]
    public function index(CompanyMetaRepository $companyMetaRepository, ReferenceRepository $referenceRepository): Response
    {
        return $this->render('app/reference.html.twig', [
            'companyMeta' => $companyMetaRepository->getCompanyMeta(),
            'references' => $referenceRepository->findPublicWithMedia()
        ]);
    }
}
