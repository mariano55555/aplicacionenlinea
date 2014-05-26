<?php
App::uses('Recomendadore', 'Model');

/**
 * Recomendadore Test Case
 *
 */
class RecomendadoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.recomendadore',
		'app.cargo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Recomendadore = ClassRegistry::init('Recomendadore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Recomendadore);

		parent::tearDown();
	}

}
