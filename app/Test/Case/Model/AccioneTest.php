<?php
App::uses('Accione', 'Model');

/**
 * Accione Test Case
 *
 */
class AccioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.accione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Accione = ClassRegistry::init('Accione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Accione);

		parent::tearDown();
	}

}
