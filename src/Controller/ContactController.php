<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\PartnerType;
use App\DataClass\Partnership;
use App\Form\EstimateIndividualsType;
use App\DataClass\EstimateIndividuals;
use App\Form\EstimateCompaniesType;
use App\DataClass\EstimateCompanies;
use DateTime;

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
    public function estimate(Request $request): Response
    {
        $estimateIndividuals = new EstimateIndividuals();
        $formIndividuals = $this->createForm(EstimateIndividualsType::class, $estimateIndividuals);
        $formIndividuals->handleRequest($request);

        if ($formIndividuals->isSubmitted() && $formIndividuals->isValid()) {
            // add date of message submission
            $estimateIndividuals->setSubmitDate(new DateTime('now'));

            // add type of message (for after_submit view purposes)
            $estimateIndividuals->setType('estimateIndividuals');

            // return after submit page
            return $this->render('front/contact/after_submit.html.twig', [
                'data' => $estimateIndividuals,
            ]);
        }

        $estimateCompanies = new EstimateCompanies();
        $formCompanies = $this->createForm(EstimateCompaniesType::class, $estimateCompanies);
        $formCompanies->handleRequest($request);

        if ($formCompanies->isSubmitted() && $formCompanies->isValid()) {
            // add date of message submission
            $estimateCompanies->setSubmitDate(new DateTime('now'));

            // add type of message (for after_submit view purposes)
            $estimateCompanies->setType('estimateCompanies');

            // return after submit page
            return $this->render('front/contact/after_submit.html.twig', [
                'data' => $estimateCompanies,
            ]);
        }

        return $this->render('front/contact/estimate.html.twig', [
            'formIndividuals' => $formIndividuals->createView(),
            'formCompanies' => $formCompanies->createView(),
        ]);
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
            // add date of message submission
            $partner->setSubmitDate(new DateTime('now'));

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
