<?php
App::uses('AppModel', 'Model');
/**
 * AccionesTablasUser Model
 *
 * @property Accion $Accion
 * @property Tabla $Tabla
 * @property User $User
 */
class AccionesTablasUser extends AppModel {
public $actsAs = array('WhoDidIt');

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Accione' => array(
			'className' => 'Accione',
			'foreignKey' => 'accion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tabla' => array(
			'className' => 'Tabla',
			'foreignKey' => 'tabla_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
