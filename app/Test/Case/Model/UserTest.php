<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.institucion',
		'app.superate',
		'app.pais',
		'app.group',
		'app.actividade',
		'app.aplicacione',
		'app.carrera',
		'app.proceso',
		'app.examen',
		'app.tema',
		'app.recomendador',
		'app.evaluacion',
		'app.beca',
		'app.familiare',
		'app.tipofamiliar',
		'app.hermano',
		'app.telefono'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
