<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 19/09/2017
 * Time: 22:20
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Emoji;
use AppBundle\Entity\Translation;
use AppBundle\Tools\CustomYamlParser;
use Symfony\Component\Config\Definition\Exception\Exception;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTranslation implements FixtureInterface
{
    public function load(ObjectManager $manager){

        //dev dir !
        $devDir    = "app/config/fixtures/translation";
        $files =['french.yml', 'arabic.yml'];

        foreach ($files as $file){
            $values = CustomYamlParser::yamlParser($devDir.'/'.$file);
            $this->saveDataFixtures($manager,$values);
        }
    }

    public function saveDataFixtures($manager, $values){

        foreach ($values as $key => $value){
            $language = $key;
            foreach ($value as $datas){
                foreach ($datas as $description => $translate){

                    $translation  = $manager->getRepository(Translation::class)->findOneBy(['translation'=>$translate]);

                    if($translation === null){
                    $emoji  = $manager->getRepository(Emoji::class)->findOneBy(['description'=>$description]);
                    $translation = new Translation();
                    $translation->setLanguage($language);
                    $translation->setTranslation($translate);
                    $emoji->addTranslation($translation);

                    $manager->persist($translation);
                    }
                }
            }
            $manager->flush();
        }
    }
}