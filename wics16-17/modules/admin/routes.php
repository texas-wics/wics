<?
return array(
	'GET /admin' => array('name' => 'admin', 'before' => 'auth', 'do' => function() {
		$view = View::of_layout();
		$view->bind('content', View::make('admin::index'));
		$view->header->topnav->active = 'admin';
		return $view;
	}),
	
	'GET /admin/login' => array('name' => 'login', function() {
		Asset::add('bootstrap', 'bootstrap/bootstrap.css');
		Asset::add('jquery', 'js/jquery.js');
		Asset::add('bootstrapalerts', 'bootstrap/js/bootstrap-alerts.js', 'jquery');
		
		$view = View::make('admin::login');
		$view->header = View::make('admin::layout/header');
     	$view->footer = View::make('admin::layout/footer');
		
		return $view;
	}),

	'POST /admin/login' => function() {
		$user = User::where_email(Input::get('email'))->first();
		if(!$user || !$user->active)
			return Redirect::to_login()->with('warning', 'Your account hasn\t been activated yet');
		elseif (Auth::login(Input::get('email'), Input::get('password')))
			return Redirect::to_admin(); 
		else 
			return Redirect::to_login()->with('error', 'Username or password is incorrect');
	},
	
	'GET /admin/logout' => array('name' => 'logout', function() {
		Auth::logout();
		return Redirect::to_login()->with('success', 'You have been logged out');
	}),
);