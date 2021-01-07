<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\PartnerType;
use App\DataClass\Partnership;

/**
 * Creates the views that allow the users send information to Mobilean
 * @Route(name="contact_")
 */
class ContactController extends AbstractController
{
    /**
     * Displays contact page
     * @Route("/contactez-nous", name="message")
     * @return Response
     */
    public function contact(): Response
    {
        return $this->render('front/contact/contact.html.twig');
    }

    /**
     * Displays page that allows users to ask for an estimate
     * @Route("/demande-de-devis", name="estimate")
     * @return Response
     */
    public function estimate(): Response
    {
        return $this->render('front/contact/estimate.html.twig');
    }

    /**
     * Displays page that allows users to ask for partnership
     * @Route("/demande-de-partenariat", name="partner")
     * @return Response
     */
    public function partner(Request $request): Response
    {
        $partner = new Partnership();
        $form = $this->createForm(PartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // add date of message submition
            $partner->setSubmitDate(date('d/m/Y'));

            // add type of message (for after_submit view purposes)
            $partner->setType('partner');

            // return after submit page
            return $this->render('front/contact/after_submit.html.twig', [
                'data' => $partner,
            ]);
        }

        return $this->render('front/contact/partner.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
