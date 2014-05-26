<?php
/**
 * AccionesTablasUserFixture
 *
 */
class AccionesTablasUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'accion_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'tabla_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_acciones_tablas_users_acciones' => array('column' => 'accion_id', 'unique' => 0),
			'FK_acciones_tablas_users_tablas' => array('column' => 'tabla_id', 'unique' => 0),
			'FK_acciones_tablas_users_users' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'accion_id' => 1,
			'tabla_id' => 1,
			'user_id' => 1,
			'created' => '2014-02-10 21:57:44'
		),
	);

}
