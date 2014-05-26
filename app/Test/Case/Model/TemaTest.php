<?php
App::uses('Tema', 'Model');

/**
 * Tema Test Case
 *
 */
class TemaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tema',
		'app.aplicacione',
		'app.user',
		'app.carrera',
		'app.proceso',
		'app.examen',
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
		$this->Tema = ClassRegistry::init('Tema');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tema);

		parent::tearDown();
	}

}
