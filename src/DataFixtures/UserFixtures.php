<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    // Create a fictiv user for to access the user interface
    public function load(ObjectManager $manager)
    {
         $admin = new user();
         $admin->setEmail('admin@monsite.fr');
         $admin->setRoles(['ROLE_ADMIN']);
         $admin->setPassword($this->passwordEncoder->encodePassword($admin, 'adminpassword'));
                  //Add a user in the database
         $manager->persist($admin);
         $manager->flush();
    }
}
