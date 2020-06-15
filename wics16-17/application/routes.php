<?php

return array(
	'GET /' => array('name' => 'index', function()
	{
		$view = View::of_layout();
		$view->bind('content', View::make('core.index'));
		$view->bind('nav', View::make('core.nav.index'));
		$view->topnav->active = 'index';
		$view->content->posts = Post::allActive();
		return $view;
	}),
	
	'GET /about' => array('name' => 'about', function()
	{
		$view = View::of_layout();
		$view->bind('content', View::make('core.about'));
		$view->bind('nav', View::make('core.nav.index'));
		$view->topnav->active = 'about';
		return $view;
	}),
	
	'GET /contact' => array('name' => 'contact', function()
	{
		$view = View::of_layout();
		$view->bind('content', View::make('core.contact'));
		$view->bind('nav', View::make('core.nav.index'));
		$view->topnav->active = 'contact';
		return $view;
	}),
	
	'GET /photos' => array('name' => 'photos', function()
	{
		$view = View::of_layout();
		$view->bind('content', View::make('core.photos'));
		$view->bind('nav', View::make('core.nav.index'));
		$view->topnav->active = 'photos';
		return $view;
	}),
	
	'GET /events' => array('name' => 'events', function()
	{
		$view = View::of_layout();
		$view->bind('content', View::make('core.events'));
		$view->bind('nav', View::make('core.nav.index'));
		$view->topnav->active = 'events';
		return $view;
	}),
	
	'GET /sponsors' => array('name' => 'sponsors', function()
	{
		$view = View::of_layout();
		$view->bind('content', View::make('core.sponsors'));
		$view->bind('nav', View::make('core.nav.index'));
		$view->topnav->active = 'sponsors';
		return $view;
	})
);