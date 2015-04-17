<?php
/*///////////////////////////////////////////////////////////////
 /** ID: | /-- ID: Indonesia
 /** EN: | /-- EN: English
 ///////////////////////////////////////////////////////////////*/

/**
 * ID: Language - Library untuk Kecik Framework, library ini khusus untuk membantu masalah bahasa 
 * EN: Language - Library for Kecik Frameowk, this library specially for help language problem
 * 
 * @author 		Dony Wahyu Isp
 * @copyright 	2015 Dony Wahyu Isp
 * @link 		http://github.com/kecik-framework/language
 * @license		MIT
 * @version 	1.0.1-alpha
 * @package		Kecik\Language
 **/
namespace Kecik;

/**
 * Language
 * @package 	Kecik\Language
 * @author 		Dony Wahyu Isp
 * @since 		1.0.0-alpha
 **/

class Language {
	/**
	 * @var array $lang
	 **/
	private $lang = [];

	/**
	 * Contructor
	 * @param array $lang
	 **/
	public function __construct(array $lang) {
		if (is_array($lang)) {
			while (list($code, $langFile) = each($lang)) {
				$myfile = fopen($langFile, "r");
				$langjson = fread($myfile,filesize($langFile));
				fclose($myfile);
				//$langjson = file_get_contents($langFile);
				$this->lang[$code] = json_decode($langjson);
			}
		} 
		
	}

	/**
	 * Overide Call
	 **/
	public function __call($code, $args) {
		$word = $args[0];
		$subs = [];
		if (isset($args[1])) 
			$subs = $args[1];

		$lang = null;
		if (count($subs)<=0) {
			if (isset($this->lang[$code]->$word))
				$lang = $this->lang[$code]->$word;
		} else {
			$prev = $this->lang[$code];
			while (list($id, $sub) = each($subs)) {
				if ( isset($prev->$sub) )
					$prev = $prev->$sub;
				else {
					$prev->$word = null;
					break;
				}
			}

			if (isset($prev->$word))
				$lang = $prev->$word;

		}
		return $lang;
	}
}