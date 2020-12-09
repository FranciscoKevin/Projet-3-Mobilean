<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="contact_")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("/contactez-nous", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('contact/contact.html.twig');
    }

    /**
     * @Route("/demande-de-devis", name="estimate")
     */
    public function estimate(): Response
    {
        return $this->render('contact/estimate.html.twig');
    }

    /**
     * @Route("/demande-de-partenariat", name="partner")
     */
    public function partner(): Response
    {
        return $this->render('contact/partner.html.twig');
    }
}
