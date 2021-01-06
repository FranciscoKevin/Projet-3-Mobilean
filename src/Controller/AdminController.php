<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/admin", name="admin_")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminController extends AbstractController
{
    /**
     * @Route(name="home")
     */
    public function home(): Response
    {
        return $this->render('admin/home.html.twig');
    }

    /**
     * @Route("/vehicules", name="vehicles")
     */
    public function vehicles(): Response
    {
        return $this->render('admin/vehicles.html.twig');
    }

    /**
     * @Route("/bornes-de-recharge", name="charging_stations")
     */
    public function chargingStations(): Response
    {
        return $this->render('admin/charging_stations.html.twig');
    }

    /**
     * @Route("/demandes-de-devis", name="estimates")
     */
    public function estimates(): Response
    {
        return $this->render('admin/estimates.html.twig');
    }

    /**
     * @Route("/demandes-de-partenariat", name="partners")
     */
    public function partners(): Response
    {
        return $this->render('admin/partners.html.twig');
    }
}
