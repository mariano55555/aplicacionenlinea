<?php
App::uses('Acceso', 'Model');

/**
 * Acceso Test Case
 *
 */
class AccesoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.acceso',
		'app.user',
		'app.institucione',
		'app.superate',
		'app.paise',
		'app.departamento',
		'app.municipio',
		'app.group',
		'app.instituciones_adicionale',
		'app.actividade',
		'app.estudio',
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
		$this->Acceso = ClassRegistry::init('Acceso');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Acceso);

		parent::tearDown();
	}

}
