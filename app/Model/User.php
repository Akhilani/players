<?php
App::uses('AppModel', 'Model');
/**
 * Team Model
 *
 * @property Player $Player
 */
class User extends AppModel {
	public $validate = array(
			'email' => 'email',
			'password' => array(
				'rule' => array('minLength', '6'),
            	'message' => 'Minimum 6 characters long'
			)
	);

}
