<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'dui' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'nit' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'genero' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'candidatoscol' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'fechaverificacion' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'codverificacion' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'institucion_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'superate_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'activo' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'nacimiento' => array('type' => 'date', 'null' => false, 'default' => null),
		'pais_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'comentarios' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'direccion' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'institucion_id', 'superate_id', 'pais_id', 'group_id'), 'unique' => 1),
			'fk_users_instituciones1_idx' => array('column' => 'institucion_id', 'unique' => 0),
			'fk_users_superates1_idx' => array('column' => 'superate_id', 'unique' => 0),
			'fk_users_paises1' => array('column' => 'pais_id', 'unique' => 0),
			'fk_users_groups1' => array('column' => 'group_id', 'unique' => 0)
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
			'dui' => 'Lorem ipsum dolor sit amet',
			'nit' => 'Lorem ipsum dolor sit amet',
			'genero' => 1,
			'username' => 'Lorem ip',
			'password' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'candidatoscol' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-01-28 20:11:17',
			'modified' => '2014-01-28 20:11:17',
			'fechaverificacion' => '2014-01-28 20:11:17',
			'codverificacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'institucion_id' => 1,
			'superate_id' => 1,
			'activo' => 1,
			'nacimiento' => '2014-01-28',
			'pais_id' => 1,
			'comentarios' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'group_id' => 1,
			'direccion' => 'Lorem ipsum dolor sit amet'
		),
	);

}
