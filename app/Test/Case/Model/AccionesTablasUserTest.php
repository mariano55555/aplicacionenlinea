<?php
App::uses('AccionesTablasUser', 'Model');

/**
 * AccionesTablasUser Test Case
 *
 */
class AccionesTablasUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.acciones_tablas_user',
		'app.accion',
		'app.tabla',
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
		$this->AccionesTablasUser = ClassRegistry::init('AccionesTablasUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AccionesTablasUser);

		parent::tearDown();
	}

}
