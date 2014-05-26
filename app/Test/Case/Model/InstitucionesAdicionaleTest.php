<?php
App::uses('InstitucionesAdicionale', 'Model');

/**
 * InstitucionesAdicionale Test Case
 *
 */
class InstitucionesAdicionaleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.instituciones_adicionale',
		'app.pais',
		'app.user',
		'app.institucione',
		'app.superate',
		'app.departamento',
		'app.paise',
		'app.municipio',
		'app.group',
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
		$this->InstitucionesAdicionale = ClassRegistry::init('InstitucionesAdicionale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InstitucionesAdicionale);

		parent::tearDown();
	}

}
