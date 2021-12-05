<?php

namespace App\Controller\Admin;

use App\Entity\Demandeprojet;
use App\Entity\Offreemploi;
use App\Entity\Reponseoffre;
use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ABCLegermain');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Offre d emploi', 'fas fa-list', Offreemploi::class);
        yield MenuItem::linkToCrud('Réponse offre', 'fas fa-list', Reponseoffre::class);
        yield MenuItem::linkToCrud('Demande client', 'fas fa-list', Demandeprojet::class);


        yield MenuItem::linkToCrud('Image', 'fas fa-list', Image::class);
    }
}
