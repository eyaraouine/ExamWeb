<?php

namespace App\DataFixtures;

use App\Entity\Enterprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EnterpriseFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
$faker = Factory::create();
        for($i=0;$i<100;$i++) {
            $enterprise = new Enterprise();
            $enterprise->setDesignation($faker->name);
            $enterprise->setTitle($faker->name);
            $manager->persist($pfe);
        }
        $manager->flush();
    }
}
