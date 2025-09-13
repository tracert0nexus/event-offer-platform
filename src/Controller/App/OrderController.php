<?php

namespace App\Controller\App;

use App\Repository\CompanyMetaRepository;
use App\Repository\ReferenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class OrderController extends AbstractController
{
    #[Route('/order', name: 'app_order')]
    public function index(CompanyMetaRepository $companyMetaRepository, ReferenceRepository $referenceRepository): Response
    {
        return $this->render('app/reference.html.twig', [
            'companyMeta' => $companyMetaRepository->getCompanyMeta(),
            'references' => $referenceRepository->findPublicWithMedia()
        ]);
    }
}
