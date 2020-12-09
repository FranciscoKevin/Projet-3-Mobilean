<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="product_")
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/", name="vehicles")
     */
    public function home(): Response
    {
        return $this->render('product/home.html.twig');
    }

    /**
     * @Route("/bornes-de-ravitaillement", name="chargingStations")
     */
    public function chargingStations(): Response
    {
        return $this->render('product/chargingStations.html.twig');
    }
}
