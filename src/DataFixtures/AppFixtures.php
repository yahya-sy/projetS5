<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\UserFactory;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne(['email' => 'yahya_admin@example.com','roles'=> ['ROLE_ADMIN']]);
        UserFactory::createOne([ 'email' => 'lucas_user@example.com',]);
        UserFactory::createMany(10);

        $manager->flush();
    }
}
