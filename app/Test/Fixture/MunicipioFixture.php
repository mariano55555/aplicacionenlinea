<?php
/**
 * MunicipioFixture
 *
 */
class MunicipioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'departamento_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'codsql_municipio' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'departamento_id'), 'unique' => 1),
			'fk_municipios_departamentos1' => array('column' => 'departamento_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'departamento_id' => 1,
			'codsql_municipio' => 'Lorem ',
			'created' => '2014-01-28 20:07:14',
			'modified' => '2014-01-28 20:07:14',
			'created_by' => 1,
			'modified_by' => 1
		),
	);

}
