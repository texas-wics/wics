<?
class Role extends Base {
	
	public static $table = 'roles';
	
	public function users()
	{
		return $this->has_and_belongs_to_many('User', 'users_roles');
	}
	
}