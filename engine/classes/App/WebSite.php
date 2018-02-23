<?php 
namespace App;
class WebSite {
	private $folder;
	public function __construct($folder) {
		$this->folder = $folder;
	}
	public function getFolderName() {
		return basename( $this->folder ); // http://php.net/basename
	}
	public function getTemplatePath() {
		return $this->folder.'/layout';
	}
	public function getContentFullpath($filename) {
		return $this->folder.'/content/'.$filename;
	}
	public function getSiteConfigurationAsArray() {
		$fullpath = $this->folder.'/configuration.json';
		$s = file_get_contents($fullpath);
		return json_decode($s, true);
	}
}