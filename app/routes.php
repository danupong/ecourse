<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group(array('domain' => Request::getHost()), function()
{
    Route::match(array('GET', 'POST'),'/{controller?}/{action?}/{id?}', function ($controller='home', $action='index', $id = null) {

    	global $_url;
    	
    	$_url = array('class'=>strtolower($controller), 'action'=>strtolower($action));



    	$name = explode('.', str_replace(Config::get('my.domain_type'), '', Request::getHost()));
    	
    	$controller = ucfirst($controller)."Controller";
    	if(count($name)>=2 && $name[0]!='www'){
    		$controller = ucfirst($name[0]).'\\'.$controller; 
    	}

		if(!class_exists($controller)){
			return '404-1';
			//return Redirect::to('/');
		}

		if(!method_exists($controller, $action)){
			return '404-2';
			//return Redirect::to('/');
		}
		
		$rf = new ReflectionMethod($controller, $action);
		if(!$rf->isPublic()) return Redirect::to('/');

	    return APP::make($controller)->{$action}($id);
	});
});

