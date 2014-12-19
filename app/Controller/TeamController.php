<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class TeamController extends Controller {
	public $name = 'Team';
	
	public $noResult = '{error: "No result"}';
	public $dbError = '{error: "DB error"}';
	
	function index(){
		$this->layout = 'proware';
				
	}
	
	/**
	 * fetch team data and show in json format
	 */
	function teams(){
		$this->autoRender = false;
		$this->response->type('json');
		try {
			$teams = $this->Team->find('all');
		}catch (Exception $e){
			echo $this->dbError;
		}
		if (!empty($teams)){
			echo json_encode($teams);
		}else{
			echo $this->noResult;
		}
	}
	
	/**
	 * fetch player data and show in json format
	 */
	function players(){
		$this->autoRender = false;
		$this->response->type('json');
		
		$this->loadModel('Player'); // player module to fetch player data
		
		$team_id = $this->request->data('teamid'); //team id from request
		
		try {
			$players = $this->Player->find('all', array('conditions' => array('team_id' => $team_id))); //players by team_id
		}catch (Exception $e){
			echo $this->dbError;
		}
		if (!empty($players)){
			echo json_encode($players);
		}else{
			echo $this->noResult;
		}
		
	}
}
