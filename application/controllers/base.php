<?php

/**
 *Luso CMS - Next generation CMS
 *
 * @package  Luso CMS
 * @author   Paulo Carvalho <pauloworkmail@gmail.com>
 * @link     http://paulocarvalhodesign.com
 * 
 */

 

class Base_Controller extends Controller {

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	

	


	public function __call($method, $parameters)
	{
		return Response::error('404');
	}


	public function __construct(){

		if(CMS_INSTALL)
		 $settings 		 = CMS::set_settings();
		 foreach($settings as $setting)
			Config::set($setting->name, $setting->value);
	   		Config::set('application.language', Config::get('language'));

	}

	
	
}