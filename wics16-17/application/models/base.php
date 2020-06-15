<?
class Base extends Eloquent{
	public function render($view = null){
		if($view){
			$view = ucfirst($view);
		}
		$filename = APP_PATH . 'models/views/' . get_called_class() . $view . '.phtml';
		include($filename);
	}
}
