<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 20; $i++) {
            $article = new Article();
            $article->setTitle($faker->sentence($nbWords = 2, $variableNbWords = true))
                ->setDescription($faker->sentence($nbWords = 10, $variableNbWords = true))
                ->setCreatedAt($faker->dateTimeBetween('-6 months'));

            $manager->persist($article);
        }

        $manager->flush();
    }
}
