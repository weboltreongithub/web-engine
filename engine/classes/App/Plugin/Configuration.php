<?php
namespace App\Plugin;
class Configuration
{
    public static function get($parName)
    {
    	global $website;
    	$arr = $website->getSiteConfigurationAsArray();
    	return $arr[$parName];
    }
}