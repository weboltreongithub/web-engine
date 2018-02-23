<?php
namespace App;
class Snippet
{
    public static function getByName($id)
    {
    	global $website;
    	$prefix = $website->getContentFullpath($id);
		$path = $prefix.'.md';
		$exists = file_exists($path);
		// var_dump($path); var_dump($exists); 
		if ($exists) {
	        $txt = file_get_contents($path);
	        $Parsedown = new \Parsedown();
	        // echo "Prima ".$txt;
			$md = $Parsedown->text($txt);
			// echo "Dopo ".$md;
			echo $md;
		} else {
			$path = $prefix.'.txt';
			$exists = file_exists($path);
			if ($exists) {
		        include($path);
			} else
				echo "Non trovo il file ($path)";
		}
    }
}