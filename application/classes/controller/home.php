<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller {

	private $card_model;
	
	private $home_view;

	public function __construct() {
		$this->card_model = Model::factory('card');
	}


	public function action_index($author = null)
	{
		if ($author == null) {
			$this->home_view = View::factory('home');
		} else {
			$this->home_view = View::factory('user_home');
			$this->home_view->author = $author;
			$this->home_view->sets = $this->card_model->retrieve_sets($author);
		}
	echo $this->home_view->render();
		
	}

}
