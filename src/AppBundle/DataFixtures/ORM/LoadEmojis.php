<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Emoji;
use AppBundle\Tools\CustomYamlParser;
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

        $values = CustomYamlParser::yamlParser($devDir.'/emojis.yml');
        foreach ($values as $key => $value){

            $category = $key;

            foreach ($value as $datas){
                foreach ($datas as $unicode => $description){
                    //Trying to get the emoji for check if it's already store
                    $emoji  = $manager->getRepository(Emoji::class)->findOneBy(['description'=>$description]);

                    //if it's not, creating a new emoji
                if(null === $emoji){
                    $emoji = new Emoji();
                    $emoji->setCategory($category);
                    $emoji->setUnicode($unicode);
                    $emoji->setDescription($description);
                    $emoji->setTranslate($description);
                    $manager->persist($emoji);
                    }
                }
            }
        }
        $manager->flush();
    }
}