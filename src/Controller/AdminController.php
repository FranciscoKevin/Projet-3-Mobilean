<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\VehicleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Vehicle;
use App\Form\VehicleType;

/**
 * @Route("/admin", name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * Displays the page home administrator
     * @Route(name="home")
     * @return Response
     */
    public function home(): Response
    {
        return $this->render('admin/home.html.twig');
    }

    /**
     * Displays the page with the all vehicles
     * @Route("/vehicules", name="vehicles")
     * @return Response
     */
    public function vehicles(VehicleRepository $vehicleRepository): Response
    {
        return $this->render('admin/vehicle_list.html.twig', [
            'vehicles' => $vehicleRepository->findAll(),
        ]);
    }

    /**
     * Displays the page with the all charging_stations
     * @Route("/bornes-de-recharge", name="charging_stations")
     * @return Response
     */
    public function chargingStations(): Response
    {
        return $this->render('admin/charging_stations.html.twig');
    }

    /**
     * Displays the page for a quote request
     * @Route("/demandes-de-devis", name="estimates")
     * @return Response
     */
    public function estimates(): Response
    {
        return $this->render('admin/estimates.html.twig');
    }

    /**
     * Displays the page for a partnership request
     * @Route("/demandes-de-partenariat", name="partners")
     * @return Response
     */
    public function partners(): Response
    {
        return $this->render('admin/partners.html.twig');
    }

     /**
     * Displays the page for add a new vehicle
     * @Route("vehicule/ajouter", name="vehicle_new", methods={"GET","POST"})
     * @return Response
     */
    public function new(Request $request): Response
    {
        $vehicle = new Vehicle();
        $form = $this->createForm(VehicleType::class, $vehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vehicle);
            $entityManager->flush();

            return $this->redirectToRoute('admin_vehicles');
        }

        return $this->render('admin/vehicle_new.html.twig', [
            'vehicle' => $vehicle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Displays the page view vehicle details
     * @Route("vehicule/{id}", name="vehicle_show", methods={"GET"})
     * @return Response
     */
    public function show(Vehicle $vehicle): Response
    {
        return $this->render('admin/vehicle_show.html.twig', [
            'vehicle' => $vehicle,
        ]);
    }

    /**
     * Provides access to the page to modify a vehicle
     * @Route("vehicule/{id}/modifier", name="vehicle_edit", methods={"GET","POST"})
     * @return Response
     */
    public function edit(Request $request, Vehicle $vehicle): Response
    {
        $form = $this->createForm(VehicleType::class, $vehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_vehicles');
        }

        return $this->render('admin/vehicle_edit.html.twig', [
            'vehicle' => $vehicle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Displays the page for delete a vehicle
     * @Route("/{id}", name="vehicle_delete", methods={"DELETE"})
     * @return Response
     */
    public function delete(Request $request, Vehicle $vehicle): Response
    {
        if ($this->isCsrfTokenValid('delete' . $vehicle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vehicle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_vehicles');
    }
}
