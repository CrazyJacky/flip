<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Create extends Controller {

	private $card_model;
	
	private $create_view;

	public function __construct() {
		$this->card_model = Model::factory('card');
	}

	public function action_index($author = null, $id = null)
	{
		if ($id == null || $this->card_model->retrieve_set($id) == null) {
			$set_arr = $this->card_model->new_set($author);
			Request::current()->redirect('../' . $author . '/create/index/' . $set_arr['_id']);
		} else {
			$this->create_view = View::factory('create');
			$this->create_view->set_arr = $this->card_model->retrieve_set($id);
			$this->create_view->author = $author;
			echo $this->create_view->render();
		}
	}

	public function action_updatecard() {
		$card = $_GET;
		echo $this->card_model->update_card($card['setId'], $card['cardId'], $card['term'], $card['def']);		
	}

	public function action_updateset() {
		$set = $_GET;
		echo $this->card_model->update_set($set['setId'], $set['title']);		
	}
}
