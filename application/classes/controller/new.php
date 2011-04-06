<?php defined('SYSPATH') or die('No direct script access.');

class Controller_New extends Controller {

	private $card_model;
	
	private $create_view;

	public function __construct() {
		$this->card_model = Model::factory('card');
	}


	public function action_index($user = null)
	{
		if ($user == null) {
			$this->home_view = View::factory('home');
		} else {
			$this->home_view = View::factory('user_home');
			$this->home_view->user = $user;
			$this->home_view->sets = $this->card_model->retrieve_sets($user);
			
			
		}
		echo $this->home_view->render();
	}

}
