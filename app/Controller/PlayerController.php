<?php
App::uses('Controller', 'Controller');

class PlayerController extends Controller {
	public $name = 'Player';
	
	public $helpers = array('Form', 'Html', 'Session');
	public $uses = array('Player');
	
	function index(){
		if (!$this->Session->read('userData')){
			$this->set('loggedIn',false);
		}else{
			$this->set('loggedIn',true);
		}
		
		$this->layout = 'sportskeeda';
		$userData = $this->Session->read('userData');
		$this->set('players', $this->Player->find('all', array('fields' => array('Player.id', 'Player.name', 'Player.points'))));
	}
	
	/**
	 * Add new player
	 */
	function add(){
		//Login Check
		if (!$this->Session->read('userData')){
			$this->redirect(array('controller' => 'user', 'action' => 'login'));
			$this->set('loggedIn',false);
		}else{
			$this->set('loggedIn',true);
		}
		$this->layout = 'sportskeeda';
		
		if ($this->request->is('post')) {
			$data = $this->request->data;
			
			//Validation of input data
			$this->Player->set($this->request->data);
			if ($this->Player->validates()) {
				// it validated
				try {
					$added = $this->Player->createPlayer($data);
					$this->redirect(array('controller' => 'user', 'action' => 'index'));
				} catch (Exception $e) {
					$this->Session->setFlash('Error adding player', 'default', array('class' => 'bg-danger'));
				}
			} else {
				// didn't validate
				$msg = '';
				$errors = $this->Player->validationErrors; 
				foreach ($errors as $error){ $msg .= $error[0].'<br />'; };
				$this->Session->setFlash($msg, 'default', array('class' => 'bg-danger'));
			}
		}
	}
	
	/**
	 * Add Points to Players
	 */
	function addpoints(){
		$this->autoRender = false;
		
		//Login Check
		if (!$this->Session->read('userData')){
			$this->redirect(array('controller' => 'user', 'action' => 'login'));
			$this->set('loggedIn',false);
		}else{
			$this->set('loggedIn',true);
		}
		if ($this->request->is('post')) {
			$data = $this->request->data;
			
			//Validation of input data
			$this->Player->set($this->request->data);
			if ($this->Player->validates(array('fieldList' => array('id', 'points')))) {
				// validated inputs
				try {
					$updated = $this->Player->addPoints($data);
					$this->redirect(array('controller' => 'player', 'action' => 'index'));
				} catch (Exception $e) {
					$this->Session->setFlash('Error adding points', 'default', array('class' => 'bg-danger'));
				}
			} else {
				// invalid inputs
				$msg = '';
				$errors = $this->Player->validationErrors;
				foreach ($errors as $error){ $msg .= $error[0].'<br />'; };
				$this->Session->setFlash($msg, 'default', array('class' => 'bg-danger'));
				$this->redirect(array('controller' => 'player', 'action' => 'index'));
			}
		}
	}
	
}
