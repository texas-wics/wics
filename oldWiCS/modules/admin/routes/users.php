<?
return array(
	'GET /admin/users' => array('name' => 'usersmanage', 'before' => 'auth', 'do' => function() {
		Asset::add('jquery', 'js/jquery.js');
		Asset::add('bootstrapalerts', 'bootstrap/js/bootstrap-alerts.js', 'jquery');
		Asset::add('jquerytablesort', 'js/jquery.tablesorter.min.js', 'jquery');
		
		$view = View::of_layout();
		$view->bind('content', '<h1>Coming Soon</h1>');
		$view->bind('nav', View::make('admin::layout.tabs'));

		$view->header->topnav->active = 'users';
		$view->nav->model = 'users';
		$view->nav->active = 'manage';
		return $view;
	}),
	
	'GET /admin/users/create' => array('name' => 'userscreate', 'before' => 'auth', 'do' => function() {
		$view = View::of_layout();
		$view->bind('content', '<h1>Coming Soon</h1>');
		$view->bind('nav', View::make('admin::layout.tabs'));

		$view->header->topnav->active = 'users';
		$view->nav->model = 'users';
		$view->nav->active = 'create';
		return $view;
	}),
);