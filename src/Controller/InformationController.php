<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="information_")
 */
class InformationController extends AbstractController
{
    /**
     * @Route("/à-propos-de-nous", name="about")
     */
    public function about(): Response
    {
        return $this->render('information/about.html.twig');
    }

    /**
     * @Route("/mentions-légales", name="legal")
     */
    public function legal(): Response
    {
        return $this->render('information/legal.html.twig');
    }
}
