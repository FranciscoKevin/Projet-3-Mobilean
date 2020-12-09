<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Creates views that allow users to see the different products
 * @Route("/", name="product_")
 */
class ProductController extends AbstractController
{
    /**
     * Displays home page
     * @Route("/", name="vehicles")
     * @return Response
     */
    public function home(): Response
    {
        return $this->render('product/home.html.twig');
    }

    /**
     * Displays informations about the charging stations
     * @Route("/nos-solutions-de-ravitaillement", name="chargingStations")
     * @return Response
     */
    public function chargingStations(): Response
    {
        return $this->render('product/chargingStations.html.twig');
    }
}
