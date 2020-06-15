<?
class Post extends Base {
	
	public static $table = 'posts';
	public static $timestamps = true;

	public function getCreatedDate()
	{
		return date("F jS, Y", strtotime($this->created_at));
	}
	
	public function getUpdatedDate()
	{
		return date("F jS, Y", strtotime($this->updated_at));
	}
	
	public function getDate()
	{
		return $this->getUpdatedDate();
	}

	public function user()
	{
		return $this->belongs_to('User');
	}
	
	public function event()
	{
		return $this->belongs_to('Event');
	}
	
	public static function allActive()
	{
		return Post::left_join('users', 'posts.user_id', '=', 'users.id')
			->left_join('events', 'posts.event_id', '=', 'events.id')
			->where('posts.active', '=', 1)
			->where('users.active', '=', 1)
			->where('events.active', '=', 1)
			->or_where('posts.active', '=', 1)
			->where('users.active', '=', 1)
			->where_null('posts.event_id')
			->select(array(
				'posts.id',
				'posts.name', 
				'posts.description', 
				'posts.created_at',
				'posts.updated_at',
				'posts.active',
				'posts.event_id',
				'posts.user_id'))
			->order_by('posts.updated_at', 'desc')
			->get();
	}
	
}