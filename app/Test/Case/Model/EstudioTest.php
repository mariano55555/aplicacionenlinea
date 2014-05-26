<?php
App::uses('Estudio', 'Model');

/**
 * Estudio Test Case
 *
 */
class EstudioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estudio',
		'app.user',
		'app.institucione',
		'app.superate',
		'app.paise',
		'app.departamento',
		'app.municipio',
		'app.group',
		'app.instituciones_adicionale',
		'app.actividade',
		'app.aplicacione',
		'app.carrera',
		'app.proceso',
		'app.examene',
		'app.tema',
		'app.recomendadore',
		'app.cargo',
		'app.evaluacione',
		'app.beca',
		'app.familiare',
		'app.tipofamiliare',
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
		$this->Estudio = ClassRegistry::init('Estudio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Estudio);

		parent::tearDown();
	}

}
