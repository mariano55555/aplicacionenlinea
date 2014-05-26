<?php
App::uses('AppModel', 'Model');
/**
 * Acceso Model
 *
 * @property User $User
 */
class Acceso extends AppModel {
public $actsAs = array('WhoDidIt');

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
