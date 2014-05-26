<?php
App::uses('AppModel', 'Model');
/**
 * Accione Model
 *
 */
class Accione extends AppModel {
public $actsAs = array('WhoDidIt');
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';



	/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'acciones_tablas_users',
			'foreignKey' => 'accion_id',
			'associationForeignKey' => 'user_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Tabla' => array(
			'className' => 'Tabla',
			'joinTable' => 'acciones_tablas_users',
			'foreignKey' => 'accion_id',
			'associationForeignKey' => 'tabla_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
	);

}
