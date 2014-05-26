<?php
App::uses('Telefono', 'Model');

/**
 * Telefono Test Case
 *
 */
class TelefonoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.telefono',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Telefono = ClassRegistry::init('Telefono');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Telefono);

		parent::tearDown();
	}

}
