<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $encoder;
    //
    public function __construct(UserPasswordHasherInterface $encoder)
    {
       $this->encoder = $encoder; 
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('toto@toto.com');
        $user->setPassword($this->encoder->hashPassword($user, 'password'));
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $manager->persist($user);

        $manager->flush();
    }
}
