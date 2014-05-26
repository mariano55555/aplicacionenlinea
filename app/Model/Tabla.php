<?php
App::uses('AppModel', 'Model');
/**
 * Tabla Model
 *
 */
class Tabla extends AppModel {
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
		'Accione' => array(
			'className' => 'Accione',
			'joinTable' => 'acciones_tablas_users',
			'foreignKey' => 'tabla_id',
			'associationForeignKey' => 'accion_id',
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
		'User' => array(
			'className' => 'User',
			'joinTable' => 'acciones_tablas_users',
			'foreignKey' => 'table_id',
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
	);

}
