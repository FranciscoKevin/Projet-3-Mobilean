<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Vehicle;

class VehicleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Add 5 vehicles random with fixtures
        for ($i = 0; $i < 5; $i++) {
            $vehicle = new Vehicle();
            $vehicle->setName('Peugeot');
            $vehicle->setDescription('jdsbcsdhjbfdsfdhb');
            $vehicle->setType('Utilitaire');
            $vehicle->setFiscalPower(1);
            $vehicle->setActualPower(1);
            $vehicle->setTankCapacityCNG(1);
            $vehicle->setConsumptionCNG(1);
            $vehicle->setTankCapacityFuel(1);
            $vehicle->setConsumptionFuel(1);
            $vehicle->setAutonomy(1);
            $vehicle->setRearVolume(1);
            $vehicle->setPhoto('img');
            $manager->persist($vehicle);
        }
        $manager->flush();
    }
}
