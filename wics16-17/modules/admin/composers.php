<?php

return array(

	'layout/layout' => array('name' => 'layout', function($view)
	{
		Asset::add('bootstrap', 'bootstrap/bootstrap.css');
		Asset::add('jquery', 'js/jquery.js');
		Asset::add('bootstrapalerts', 'bootstrap/js/bootstrap-alerts.js', 'jquery');
		Asset::add('jquerytablesort', 'js/jquery.tablesorter.min.js', 'jquery');
		
		$view->header = View::make('admin::layout/header');
		$view->header->topnav = View::make('admin::layout/topnav');
     	$view->footer = View::make('admin::layout/footer');
		
		return $view;
	}),

);