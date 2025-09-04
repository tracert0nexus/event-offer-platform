<?php

namespace App\Controller\Admin;

use App\Entity\CompanyMeta;
use App\Entity\Media;
use App\Entity\Order;
use App\Entity\Reference;
use App\Entity\Services;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin');
    }




    public function configureMenuItems(): iterable {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud('CompanyMeta', 'fa fa-users', CompanyMeta::class);
        yield MenuItem::linkToCrud('Services', 'fa fa-users', Services::class);
        yield MenuItem::linkToCrud('Orders', 'fa fa-users', Order::class);
        yield MenuItem::linkToCrud('Reference', 'fa fa-users', Reference::class);
        yield MenuItem::linkToCrud('Media', 'fa fa-users', Media::class);

        // optional: externe Links / eigene Routen
        // yield MenuItem::linkToRoute('Offerte-Form', 'fa fa-paper-plane', 'offer_form');
        // yield MenuItem::linkToUrl('Doku', 'fa fa-book', 'https://…');
    }
}
