<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Creates complementary views
 * @Route(name="information_")
 */
class InformationController extends AbstractController
{
    /**
     * Displays informations about Mobilean
     * @Route("/a-propos-de-nous", name="about")
     * @return Response
     */
    public function about(): Response
    {
        return $this->render('front/information/about.html.twig');
    }

    /**
     * Displays legal notices
     * @Route("/mentions-legales", name="legal")
     * @return Response
     */
    public function legal(): Response
    {
        return $this->render('front/information/legal.html.twig');
    }
}
