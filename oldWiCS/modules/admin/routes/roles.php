<?
return array(
	'GET /admin/roles' => array('name' => 'rolesmanage', 'before' => 'auth', 'do' => function() {
		Asset::add('jquery', 'js/jquery.js');
		Asset::add('bootstrapalerts', 'bootstrap/js/bootstrap-alerts.js', 'jquery');
		Asset::add('jquerytablesort', 'js/jquery.tablesorter.min.js', 'jquery');
		
		$view = View::of_layout();
		$view->bind('content', '<h1>Coming Soon</h1>');
		$view->bind('nav', View::make('admin::layout.tabs'));

		$view->header->topnav->active = 'roles';
		$view->nav->model = 'roles';
		$view->nav->active = 'manage';
		return $view;
	}),
	
	'GET /admin/roles/create' => array('name' => 'rolescreate', 'before' => 'auth', 'do' => function() {
		$view = View::of_layout();
		$view->bind('content', '<h1>Coming Soon</h1>');
		$view->bind('nav', View::make('admin::layout.tabs'));

		$view->header->topnav->active = 'roles';
		$view->nav->model = 'roles';
		$view->nav->active = 'create';
		return $view;
	}),
);