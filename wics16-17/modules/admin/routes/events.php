<?
return array(
	'GET /admin/events' => array('name' => 'eventsmanage', 'before' => 'auth', 'do' => function() {
		$view = View::of_layout();
        $view->bind('content', View::make('admin::events.manage'));
        $view->bind('nav', View::make('admin::layout.tabs'));
        $view->header->topnav->active = 'events';
        $view->nav->model = 'events';
        $view->nav->active = 'manage';

        $current_user = Auth::user();
        if($current_user->getClearance() === 1){
            $view->content->events = Event::all();
        }
        else {
            $view->content->events = Event::where_user_id($current_user->id);
        }
		return $view;
	}),

    'POST /admin/events' => array('before' => 'auth', 'do' => function() {
        $delete_events = Input::get('delete') ? Input::get('delete') : array();
        foreach($delete_events as $id){
            $event = Event::find($id);
            $event->delete();
        }
        $current_user = Auth::user();
        if($current_user->getClearance() === 1){
            $events = Event::all();
        }
        else {
            $events = Event::where_user_id($current_user->id);
        }
        return Redirect::to_eventsmanage()->with('success', 'Changes made successfully');
    }),
	
    'GET /admin/events/create, GET /admin/events/update/(:num)' => array('name' => 'eventscreate', 'before' => 'auth', 'do' => function($id = null) {
        $view = View::of_layout();
        $view->bind('content', View::make('admin::events.create'));
        $view->bind('nav', View::make('admin::layout.tabs'));
        $view->header->topnav->active = 'events';
        $view->nav->model = 'events';
        $view->nav->active = $id ? 'update' : 'create';

        $view->content->event = $id ? Event::find($id+0) : null;
        if($view->content->event === null && $id !== null){
            return Redirect::to_eventsmanage()->with('error', 'Event does not exist');
        }

        $current_user = Auth::user();
        $view->content->current_user = $current_user;
        $view->content->users = User::all();

        return $view;
    }),

    'POST /admin/events/create, POST /admin/events/update/(:num)' => array('needs' => 'markdown', 'before' => 'auth', 'do' => function($id = null) {
        $input = Input::all();
        $redirect_location = $id ? "admin/events/update/$id" : 'admin/events/create';
        if($id && $input['id'] != $id){
            return Redirect::to($redirect_location)->with('errors', array());
        }
        $event = $id ? Event::find($id+0) : null;
        if($event === null && $id !== null){
            return Redirect::to_eventsmanage()->with('error', 'Event does not exist');
        }
        $rules = array(
            'name'  => array('required', 'max:100'),
            'description' => array('required'),
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
            $description = MarkdownText(Input::get('description'));
            return Redirect::to($redirect_location)->with('preview', $description);
        } else {
            $verb = isset($event) ? 'updated' : 'created';
            $event = isset($event) ? $event : new Event;
            $event->name = $input['name'];
            $event->description = MarkdownText($input['description']);
            $event->user_id = $input['user_id'];
            $event->start_time = $input['start_date'].'T'.$input['start_time'];
            $event->end_time = $input['end_date'].'T'.$input['end_time'];
            $event->location = $input['location'];
            $event->active = (int)isset($input['publish']);
            $event->save();
            return Redirect::to($redirect_location)->with('success', 'Event successfully '.$verb.($event->active?' and published':''));
        }
    }),

    'GET /admin/events/update' => array('before' => 'auth', 'do' => function() {
        return Redirect::to_eventsmanage()->with('error', 'To update a event click on its update link in the table below');
    })
);