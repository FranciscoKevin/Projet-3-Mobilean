<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\RefillStation;

class RefillStationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Add 5 refillStation random with fixtures
        for ($i = 0; $i < 5; $i++) {
            $refillStation = new RefillStation();
            $refillStation->setName('Borne1');
            $refillStation->setDescription('jdsbcsdhjbfdsfdhb');
            $refillStation->setDebit(100);
            $refillStation->setInstallation('abc');
            $refillStation->setRefillTime(3);
            $refillStation->setAdditionalStorage(true);
            $refillStation->setPhoto('img');
            $manager->persist($refillStation);
        }
        $manager->flush();
    }
}
