<?php

return array(
	'layout.layout' => array('name' => 'layout', function($view)
	{
		Asset::add('jquery', 'js/jquery.js');
		Asset::add('bootstrap', 'bootstrap/bootstrap.css');
		Asset::add('layout', 'css/core/layout/layout.css');
		
		$view->header = View::make('layout/header');
		$view->topnav = View::make('layout/topnav');
     	$view->footer = View::make('layout/footer');

		return $view;
	}),

);