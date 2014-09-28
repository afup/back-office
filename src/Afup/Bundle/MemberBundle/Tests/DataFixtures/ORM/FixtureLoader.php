<?php

namespace Afup\Bundle\MemberBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Nelmio\Alice\Fixtures;

class FixturesLoader implements FixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        Fixtures::load(
            array(
                __DIR__ . '/../../Resources/fixtures/users.yml',
            ),
            $manager
        );
    }
}
