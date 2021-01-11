<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\RefillStation;
use App\Form\RefillStationType;
use App\Repository\RefillStationRepository;
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
     * Displays the page with the all charging-stations
     * @Route("/bornes-de-recharge", name="charging_stations")
     * @return Response
     */
    public function chargingStations(RefillStationRepository $refillStation): Response
    {
        return $this->render('admin/charging_stations.html.twig', [
            'refill_stations' => $refillStation->findAll(),
        ]);
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

    /**
     * Displays the page for add a new charging-station
     * @Route("borne-de-recharge/ajouter", name="charging_station_new", methods={"GET","POST"})
     * @return Response
     */
    public function newChargingStation(Request $request): Response
    {
        $refillStation = new RefillStation();
        $form = $this->createForm(RefillStationType::class, $refillStation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($refillStation);
            $entityManager->flush();

            return $this->redirectToRoute('admin_charging_stations');
        }

        return $this->render('admin/charging_station_new.html.twig', [
            'refill_station' => $refillStation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Displays the page view charging-station details
     * @Route("borne-de-recharge/{id}", name="charging_station_show", methods={"GET"})
     * @return Response
     */
    public function showChargingStation(RefillStation $refillStation): Response
    {
        return $this->render('admin/charging_station_show.html.twig', [
            'refill_station' => $refillStation,
        ]);
    }

    /**
     * Provides access to the page to modify a charging-station
     * @Route("borne-de-recharge/{id}/modifier", name="charging_station_edit", methods={"GET","POST"})
     * @return Response
     */
    public function editChargingStation(Request $request, RefillStation $refillStation): Response
    {
        $form = $this->createForm(RefillStationType::class, $refillStation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_charging_stations');
        }

        return $this->render('admin/charging_station_edit.html.twig', [
            'refill_station' => $refillStation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Displays the page for delete a charging-station
     * @Route("/{id}", name="charging_station_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteChargingStation(Request $request, RefillStation $refillStation): Response
    {
        if ($this->isCsrfTokenValid('delete' . $refillStation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($refillStation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_charging_stations');
    }
}
