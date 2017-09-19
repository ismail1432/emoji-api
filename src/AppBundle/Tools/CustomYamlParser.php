<?php

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 19/09/2017
 * Time: 23:29
 */

namespace AppBundle\Tools;

use Symfony\Component\Yaml\Yaml;

class CustomYamlParser
{
    public static function yamlParser($filePath)
    {
        return Yaml::parse(file_get_contents($filePath, true));
    }
}