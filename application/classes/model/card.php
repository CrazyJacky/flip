<?php defined('SYSPATH') or die('No direct script access.');

class Model_Card {

	private $m_handle;
	private $m_db;
	private $m_sets;


	public function __construct() {
		$this->m_handle = new Mongo();
		$this->m_db = $this->m_handle->selectDB('flip');
		$this->m_sets = $this->m_db->selectCollection('sets');
	}

	public function new_set($author, $title = 'Untitled Set') {
		$new_set = array(
			'title' => $title,
			'author' => $author,
			'cards' => array()
		);
		$this->m_sets->insert($new_set);
		return $new_set;
	}

	public function retrieve_sets($author) {
		return $this->m_sets->find(array('author' => $author));
	}

	public function retrieve_set($id) {
		return $this->m_sets->findOne(array('_id' =>  new MongoId($id)));
	}

	public function remove_set() {
	
	}

	public function update_card($setId, $cardId, $term, $def) {
		$initial_set = $this->retrieve_set($setId);
		$current_set = $initial_set;
		$current_set['cards'][$cardId] = array(
			
			'term' => $term,
			'def' => $def
		);
		echo '<pre>';
		print_r($current_set);
		$this->m_sets->save($current_set, array('safe'=>true));
	}
	
	public function update_set($setId, $title) {
		$initial_set = $this->retrieve_set($setId);
		$current_set = $initial_set;
		$current_set['title'] = $title;
		echo 'uhh';
		$this->m_sets->save($current_set, array('safe'=>true));
		print_r($current_set);
	}

	public function remove_card() {
	
	}

}
