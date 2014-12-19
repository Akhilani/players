<?php
App::uses('Controller', 'Controller');

class UserController extends Controller {
	public $name = 'User';
	
	public $helpers = array('Form', 'Html', 'Session');
	public $uses = array('Player', 'User');
	
	/**
	 * List all players
	 */
	function index(){
		//Login Check
		if (!$this->Session->read('userData')){
			$this->redirect('/user/login');
			$this->set('loggedIn',false);
		}else{
			$this->set('loggedIn',true);
		}
		$this->layout = 'sportskeeda';
		$userData = $this->Session->read('userData');
		$this->set('players', $this->Player->find('all', array('fields' => array('Player.id', 'Player.name', 'Player.points'))));
	}
	
	function login(){
		$this->layout = 'sportskeeda';
		
		if ($this->request->is('post')) {
			$data = $this->request->data;
			
			//Validation of input data
			$this->User->set($this->request->data);
			if ($this->User->validates(array('fieldList' => array('email', 'password')))) {
				$userData = $this->User->find('first',array('conditions'=>array('email'=>$data['email'], 'password'=>md5($data['password'])), 'fields' => array('User.name', 'User.email')));
				if (!empty($userData['User'])) {
					$userData['User']['email'] = $userData['User']['email'];
					$userData['User']['name'] = $userData['User']['name'];
				
					$this->Session->write('userData', $userData);
					$this->redirect(array('controller' => 'user', 'action' => 'index'));
				}else{
					$this->Session->setFlash('Username or password incorrect', 'default', array('class' => 'bg-danger'));
				}
			}else{
				$msg = '';
				$errors = $this->User->validationErrors;
				foreach ($errors as $error){ $msg .= $error[0].'<br />'; };
				$this->Session->setFlash($msg, 'default', array('class' => 'bg-danger'));
				$this->redirect(array('controller' => 'user', 'action' => 'login'));
			}
				
		}
		
	}
	
	function logout() {
		$this->autoRender = false;
		$this->Session->delete('userData');
		$this->redirect(array('controller' => 'user', 'action' => 'index'));
	}
	
}
