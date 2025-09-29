<?php

namespace App\DataFixtures;

use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;



class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $faker = Faker\Factory::create('fr_FR');
            $categorie = new \App\Entity\CategoriePlat();
            $categorie->setNom($faker->name());
            $categorie->setDescription($faker->text());
            $manager->persist($categorie);
        }

        $manager->flush();
    }
}
