<?php
App::uses('Proceso', 'Model');

/**
 * Proceso Test Case
 *
 */
class ProcesoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.proceso',
		'app.aplicacione',
		'app.user',
		'app.carrera',
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
		$this->Proceso = ClassRegistry::init('Proceso');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Proceso);

		parent::tearDown();
	}

}
