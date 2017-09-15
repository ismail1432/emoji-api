<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Emoji;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 15/09/2017
 * Time: 00:29
 */
class LoadEmojis implements FixtureInterface
{
    public function load(ObjectManager $manager){

        $emojis = new Emoji();
        $emojis->setUnicode("1F601");
        $emojis->setDescription("grinning face with smiling eyes");

        $emoji = new Emoji();
        $emoji->setUnicode("1F602");
        $emoji->setDescription("face with tears of joy");

        $manager->persist($emoji);
        $manager->persist($emojis);
        $manager->flush();
    }
}