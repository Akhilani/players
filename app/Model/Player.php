<?php
App::uses('AppModel', 'Model');
/**
 * Player Model
 *
 * @property Team $Team
 */
class Player extends AppModel {
	
	//Validation rules
	 public $validate = array(
        'name' => array(
            'alphaNumeric' => array(
                'rule' => array('custom', '/^[a-z ]*$/i'),
                'required' => true,
                'message' => 'Name should have letters and spaces only'
            )
        ),
        'points' => array(
            'rule' => 'numeric',
            'message' => 'Points must be a number'
        )
    );
	/**
	 * Create Player
	 * @param unknown $data
	 */
	function createPlayer($data){
		$this->create();
		$this->save($data);
	}
	
	/**
	 * Increment Points
	 * @param unknown $data
	 */
	function addPoints($data){
		$this->updateAll(
				array('Player.points' => 'Player.points+'.$data['Player']['points']),
				array('Player.id' => $data['Player']['id'])
		);
	}
}
