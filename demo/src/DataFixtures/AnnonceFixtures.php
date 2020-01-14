<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Annonce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

// class to create posts in database
class AnnonceFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i=1; $i <4; $i++){
            $annonce = new Annonce();
            $user = $manager->getRepository(User::class)->findOneBySomeField($i);

            $annonce->setContent("Contenu de l'article n$i :
                                duduududuuuuuuuuuuuuuuuuuuu
                                dudduududuududududududuuddu
                                duududududududududuudududud
                                duududuudududududuudududu")
                    ->setCreatedAt(new \DateTime())
                    ->setUser($user);

            $manager->persist($annonce);

        }
        $manager->flush();
    }
}
