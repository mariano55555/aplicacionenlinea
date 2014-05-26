<?php
App::uses('Aplicacione', 'Model');

/**
 * Aplicacione Test Case
 *
 */
class AplicacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.aplicacione',
		'app.user',
		'app.carrera',
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
		$this->Aplicacione = ClassRegistry::init('Aplicacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Aplicacione);

		parent::tearDown();
	}

}
