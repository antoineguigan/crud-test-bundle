<?php
/*
 * This file is part of the Qimnet update tracker Bundle.
 *
 * (c) Antoine Guigan <aguigan@qimnet.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Qimnet\CRUDTestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Qimnet\CRUDTestBundle\Entity\CRUDTest;

class LoadCRUDTests implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

    }
}
