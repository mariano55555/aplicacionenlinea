<?php
App::uses('Municipio', 'Model');

/**
 * Municipio Test Case
 *
 */
class MunicipioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.municipio',
		'app.departamento',
		'app.pais'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Municipio = ClassRegistry::init('Municipio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Municipio);

		parent::tearDown();
	}

}
