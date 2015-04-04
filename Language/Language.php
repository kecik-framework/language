<?php
/**
 * Language - Library untuk framework kecik, library ini khusus untuk membantu masalah bahasa 
 *
 * @author 		Dony Wahyu Isp
 * @copyright 	2015 Dony Wahyu Isp
 * @link 		http://github.io/kecik_language
 * @license		MIT
 * @version 	1.0-alpha
 * @package		Kecik\Language
 **/
namespace Kecik;

/**
 * Controller
 * @package 	Kecik\Language
 * @author 		Dony Wahyu Isp
 * @since 		1.0-alpha
 **/

class Language {
	private $lang = array();

	/**
	 * $lang = new Kecik\Language(array(
	 *		'id'=>'lang_id.json',
	 *		'us'=>'lang_us.json'
	 * ));
	 **/
	public function __construct(array $lang) {
		if (is_array($lang)) {
			while (list($code, $langFile) = each($lang)) {
				$langjson = file_get_contents(ROUTE::$BASEURL.$langFile);
				$this->lang[$code] = json_decode($langjson);
			}
		} 
		
	}

	public function __call($code, $args) {
		$word = $args[0];
		$subs=array();
		if (isset($args[1])) 
			$subs = $args[1];

		$lang = null;
		if (count($subs)<=0) {
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