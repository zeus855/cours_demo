<?php

namespace App\DataFixtures;

use App\Entity\Livre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LivreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $livre = new Livre();
        $livre->setTitre("Lucky Luke");
        $livre->setDescription("Lucky Luke, ce personnage immortel parcourt depuis 1947 l'histoire de l'Ouest américain. Il y a rencontré des personnages célèbres comme Jesse James, Calamity Jane, Billy the Kid, ou encore Sarah Bernhardt.");
        $livre->setImageName('lucky.png');
        $manager->persist($livre);

        $manager->flush();
    }
}
