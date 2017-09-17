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
        $a = "\u1F602";
        $emojis->setUnicode($a);
        $emojis->setDescription("grinning face with smiling esyes");

        $emoji = new Emoji();
        $b = "\u1F601";

        $emoji->setUnicode($b);
        $emoji->setDescription("face with tears of josy");

        $manager->persist($emoji);
        $manager->persist($emojis);
        $manager->flush();
    }
}