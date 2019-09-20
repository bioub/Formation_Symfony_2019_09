<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $steve = new Contact();
        $steve->setFirstName('Steve')->setLastName('Jobs');
        $manager->persist($steve);

        $bill = new Contact();
        $bill->setFirstName('Bill')->setLastName('Gates');
        $manager->persist($bill);

        $manager->flush();
    }
}
