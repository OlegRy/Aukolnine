<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language_lib {

	public function __construct()
    {
        
    }

	public function detect(){
		$CI =& get_instance();
		$lang = $CI->session->userdata('lang');
		if(!$lang){
			if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
				$lang = explode(",",strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']));
				$lang = explode("-",$lang[0]);
				$lang = $lang[0];
			}else{
				$lang = 'ru';
			}
			$CI->language_lib->change_lang($lang);

		}
		return $lang;
	}

	public function change_lang($lang){
		$CI =& get_instance();
		$CI->session->set_userdata(["lang" => $lang]);
	}
	
		
}
