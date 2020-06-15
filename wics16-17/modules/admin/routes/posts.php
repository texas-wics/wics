<?
return array(	
	'GET /admin/posts' => array('name' => 'postsmanage', 'before' => 'auth', 'do' => function() {
		$view = View::of_layout();
		$view->bind('content', View::make('admin::posts.manage'));
		$view->bind('nav', View::make('admin::layout.tabs'));
		$view->header->topnav->active = 'posts';
		$view->nav->model = 'posts';
		$view->nav->active = 'manage';
		
		$current_user = Auth::user();
		if($current_user->getClearance() === 1){
			$view->content->posts = Post::all();
		}
		else {
			$view->content->posts = Post::where_user_id($current_user->id);
		}
		
		return $view;
	}),
	
	'POST /admin/posts' => array('before' => 'auth', 'do' => function() {
		$delete_posts = Input::get('delete') ? Input::get('delete') : array();
		foreach($delete_posts as $id){
			$post = Post::find($id);
			$post->delete();
		}
		$current_user = Auth::user();
		if($current_user->getClearance() === 1){
			$posts = Post::all();
		}
		else {
			$posts = Post::where_user_id($current_user->id);
		}
		$publish_posts = Input::get('publish') ? Input::get('publish') : array();
		foreach($posts as $post){
			if((bool)$post->active != in_array($post->id, $publish_posts)){
				$post->active = (int)!$post->active;
				$post->save();
			}
		}
		return Redirect::to_postsmanage()->with('success', 'Changes made successfully');
	}),
	
	'GET /admin/posts/create, GET /admin/posts/update/(:num)' => array('name' => 'postscreate', 'before' => 'auth', 'do' => function($id = null) {
		$view = View::of_layout();
		$view->bind('content', View::make('admin::posts.create'));
		$view->bind('nav', View::make('admin::layout.tabs'));
		$view->header->topnav->active = 'posts';
		$view->nav->model = 'posts';
		$view->nav->active = $id ? 'update' : 'create';
		
		$view->content->post = $id ? Post::find($id+0) : null;
		if($view->content->post === null && $id !== null){
			return Redirect::to_postsmanage()->with('error', 'Post does not exist');
		}
		
		$current_user = Auth::user();
		$view->content->current_user = $current_user;
		$view->content->users = User::all();
		
		return $view;
	}),
	
	'POST /admin/posts/create, POST /admin/posts/update/(:num)' => array('needs' => 'markdown', 'before' => 'auth', 'do' => function($id = null) {
		$input = Input::all();
		$redirect_location = $id ? "admin/posts/update/$id" : 'admin/posts/create';
		if($id && $input['id'] != $id){
			return Redirect::to($redirect_location)->with('errors', array());
		}
		$post = $id ? Post::find($id+0) : null;
		if($post === null && $id !== null){
			return Redirect::to_postsmanage()->with('error', 'Post does not exist');
		}
		$rules = array(
		    'name'  => array('required', 'max:100'),
		    'markdown' => array('required'),
		);
		$messages = array(
			'required' => 'Required',
			'max' => 'Must be less than :max characters'
		);
		$validator = Validator::make($input, $rules, $messages);
		if ( ! $validator->valid())
		{
		    return Redirect::to($redirect_location)->with('errors', $validator->errors);
		}
		
		if(Input::has('preview')){
			$description = MarkdownText(Input::get('markdown'));
			return Redirect::to($redirect_location)->with('preview', $description);
		} else {
			$verb = isset($post) ? 'updated' : 'created';
			$post = isset($post) ? $post : new Post;
			$post->name = $input['name'];
			$post->markdown = $input['markdown'];
			$post->description = MarkdownText($post->markdown);
			$post->user_id = $input['user_id'];
			$post->active = (int)isset($input['publish']);
			$post->save();
			return Redirect::to($redirect_location)->with('success', 'Post successfully '.$verb.($post->active?' and published':''));
		}
	}),
	
	'GET /admin/posts/update' => array('before' => 'auth', 'do' => function() {
		return Redirect::to_postsmanage()->with('error', 'To update a post click on its update link in the table below');
	})
);