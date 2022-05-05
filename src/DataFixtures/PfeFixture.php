<?php

namespace App\DataFixtures;

use App\Entity\PFE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PfeFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for($i=0;$i<100;$i++) {
            $pfe = new PFE();
            $pfe->setStudentname($faker->firstName);

            $pfe->setTitle($faker->name);

            $manager->persist($pfe);
        }

        $manager->flush();
    }
}
