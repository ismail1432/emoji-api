<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 17/09/2017
 * Time: 17:28
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Emoji;
use AppBundle\Entity\Translation;
use Symfony\Component\Yaml\Yaml;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadArabicTranslation implements FixtureInterface
{
    public function load(ObjectManager $manager){

        //dev dir !
        $devDir    = 'app/config/fixtures/translation/arabic.yml';

        $values = Yaml::parse(file_get_contents($devDir, true));

        foreach ($values as $key => $value){

            $language = $key;

            foreach ($value as $datas){
                foreach ($datas as $description => $translate){

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