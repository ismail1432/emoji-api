<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Emoji;
use Symfony\Component\Yaml\Yaml;
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

        //dev dir !
        $devDir    = 'app/config/fixtures';


        $values = Yaml::parse(file_get_contents("$devDir/emojis.yml"));
        foreach ($values as $key => $value){

            $category = $key;

            foreach ($value as $datas){
                foreach ($datas as $unicode => $description){
                $emoji = new Emoji();
                $emoji->setCategory($category);
                $emoji->setUnicode($unicode);
                $emoji->setDescription($description);

              $manager->persist($emoji);
                }
            }

        }
        $manager->flush();
    }
}