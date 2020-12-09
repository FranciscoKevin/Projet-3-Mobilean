<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Creates the views that allow the users send information to Mobilean
 * @Route("/", name="contact_")
 */
class ContactController extends AbstractController
{
    /**
     * Displays contact page
     * @Route("/contactez-nous", name="contact")
     * @return Response
     */
    public function contact(): Response
    {
        return $this->render('contact/contact.html.twig');
    }

    /**
     * Displays page that allows users to ask for an estimate
     * @Route("/demande-de-devis", name="estimate")
     * @return Response
     */
    public function estimate(): Response
    {
        return $this->render('contact/estimate.html.twig');
    }

    /**
     * Displays page that allows users to ask for partnership
     * @Route("/demande-de-partenariat", name="partner")
     * @return Response
     */
    public function partner(): Response
    {
        return $this->render('contact/partner.html.twig');
    }
}
