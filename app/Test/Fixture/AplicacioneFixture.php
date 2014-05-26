<?php
/**
 * AplicacioneFixture
 *
 */
class AplicacioneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'carrera_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'proceso_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'examen_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'tema_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'recomendador_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'evaluacion_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'year' => array('type' => 'text', 'null' => false, 'default' => null, 'length' => 4),
		'ensayo' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'finalizado' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'actividad' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'sql' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'idiomas' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'calificacion' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '4,2'),
		'codigoPostulante' => array('type' => 'integer', 'null' => true, 'default' => null),
		'comentarios' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'user_id', 'carrera_id', 'proceso_id', 'examen_id', 'tema_id', 'recomendador_id', 'evaluacion_id'), 'unique' => 1),
			'fk_periodos_users_users1_idx' => array('column' => 'user_id', 'unique' => 0),
			'fk_periodos_users_carreras1_idx' => array('column' => 'carrera_id', 'unique' => 0),
			'fk_periodos_users_procesos1_idx' => array('column' => 'proceso_id', 'unique' => 0),
			'fk_periodos_users_examenes1_idx' => array('column' => 'examen_id', 'unique' => 0),
			'fk_periodos_users_temas1_idx' => array('column' => 'tema_id', 'unique' => 0),
			'fk_periodos_users_recomendadores1_idx' => array('column' => 'recomendador_id', 'unique' => 0),
			'fk_periodos_users_evaluaciones1' => array('column' => 'evaluacion_id', 'unique' => 0)
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
			'user_id' => 1,
			'carrera_id' => 1,
			'proceso_id' => 1,
			'examen_id' => 1,
			'tema_id' => 1,
			'recomendador_id' => 1,
			'evaluacion_id' => 1,
			'year' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'ensayo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'finalizado' => 1,
			'actividad' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'sql' => 1,
			'idiomas' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'calificacion' => 1,
			'codigoPostulante' => 1,
			'comentarios' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
