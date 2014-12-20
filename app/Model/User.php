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
	);

}
