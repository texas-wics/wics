<?
class Event extends Base {
	
	public static $table = 'events';
	
	public function getStartTime() 
	{
		return date("g:i A", strtotime($this->start_time));
	}
	
	public function getEndTime() 
	{
		return date("g:i A", strtotime($this->end_time));
	}
	
	public function getDate() 
	{
		return date("l, F jS, Y", strtotime($this->start_time));
	}
	
	public function user()
	{
		return $this->belongs_to('User');
	}
	
}
