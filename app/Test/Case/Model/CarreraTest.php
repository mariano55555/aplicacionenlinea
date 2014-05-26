<?php
App::uses('Carrera', 'Model');

/**
 * Carrera Test Case
 *
 */
class CarreraTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.carrera',
		'app.aplicacione',
		'app.user',
		'app.proceso',
		'app.examen',
		'app.tema',
		'app.recomendador',
		'app.evaluacion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Carrera = ClassRegistry::init('Carrera');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Carrera);

		parent::tearDown();
	}

}
