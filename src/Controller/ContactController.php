<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Knp\Snappy\Pdf;
use App\Form\PartnerType;
use App\DataClass\Partnership;
use App\Form\EstimateIndividualsType;
use App\DataClass\EstimateIndividuals;
use App\Form\EstimateCompaniesType;
use App\DataClass\EstimateCompanies;
use App\Form\ContactType;
use App\DataClass\Contact;
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
    public function contact(Request $request, MailerInterface $mailer, Pdf $pdf): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // add date of message submission
            $contact->setSubmitDate(new DateTime('now'));

            // add type of message (for after_submit view purposes)
            $contact->setType('contact');

            // generate pdf
            $filename = 'demande-' . uniqid() . '.pdf';
            $pdf->generateFromHtml(
                $this->renderView(
                    'pdf.html.twig',
                    ['data'  => $contact,],
                ),
                'assets/contact/' . $filename
            );

            // send mail
            $email = (new Email())
                ->from('email_from@example.com')
                ->to('email_to@example.com')
                ->subject($contact->getSubject())
                ->html($this->renderView('email.html.twig', [
                    'data' => $contact,
                ]))
                ->attachFromPath('assets/contact/' . $filename);
            $mailer->send($email);

            // return after submit page
            return $this->render('front/contact/after_submit.html.twig', [
                'data' => $contact,
            ]);
        }

        return $this->render('front/contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Displays page that allows users to ask for an estimate
     * @Route("/demande-de-devis", name="estimate")
     * @return Response
     */
    public function estimate(Request $request, MailerInterface $mailer, Pdf $pdf): Response
    {
        $estimateIndividuals = new EstimateIndividuals();
        $formIndividuals = $this->createForm(EstimateIndividualsType::class, $estimateIndividuals);
        $formIndividuals->handleRequest($request);

        if ($formIndividuals->isSubmitted() && $formIndividuals->isValid()) {
            // add date of message submission
            $estimateIndividuals->setSubmitDate(new DateTime('now'));

            // add type of message (for after_submit view purposes)
            $estimateIndividuals->setType('estimateIndividuals');

            // generate pdf
            $filename = 'demande-devis-' . uniqid() . '.pdf';
            $pdf->generateFromHtml(
                $this->renderView(
                    'pdf.html.twig',
                    ['data'  => $estimateIndividuals,],
                ),
                'assets/estimates/' . $filename
            );

            // send mail
            $email = (new Email())
                ->from('email_from@example.com')
                ->to('email_to@example.com')
                ->subject('Demande de devis : ' .
                $estimateIndividuals->getFirstName() .
                ' ' . $estimateIndividuals->getLastName())
                ->html($this->renderView('email.html.twig', [
                    'data' => $estimateIndividuals,
                ]))
                ->attachFromPath('assets/estimates/' . $filename);
            $mailer->send($email);

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

            // generate pdf
            $filename = 'demande-devis-' . uniqid() . '.pdf';
            $pdf->generateFromHtml(
                $this->renderView(
                    'pdf.html.twig',
                    ['data'  => $estimateCompanies,],
                ),
                'assets/estimates/' . $filename
            );

            // send mail
            $email = (new Email())
                ->from('email_from@example.com')
                ->to('email_to@example.com')
                ->subject('Demande de devis : ' . $estimateCompanies->getBusinessName())
                ->html($this->renderView('email.html.twig', [
                    'data' => $estimateCompanies,
                ]))
                ->attachFromPath('assets/estimates/' . $filename);
            $mailer->send($email);

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
    public function partner(Request $request, MailerInterface $mailer, Pdf $pdf): Response
    {
        $partner = new Partnership();
        $form = $this->createForm(PartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // add date of message submission
            $partner->setSubmitDate(new DateTime('now'));

            // add type of message (for after_submit view purposes)
            $partner->setType('partner');

            // generate pdf
            $filename = 'demande-partenariat-' . uniqid() . '.pdf';
            $pdf->generateFromHtml(
                $this->renderView(
                    'pdf.html.twig',
                    ['data'  => $partner,],
                ),
                'assets/partners/' . $filename
            );

            // send mail
            $email = (new Email())
                ->from('email_from@example.com')
                ->to('email_to@example.com')
                ->subject('Demande de partenariat : ' . $partner->getBusinessName())
                ->html($this->renderView('email.html.twig', [
                    'data' => $partner,
                ]))
                ->attachFromPath('assets/partners/' . $filename);
            $mailer->send($email);

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
