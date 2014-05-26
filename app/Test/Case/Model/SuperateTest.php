<?php
App::uses('Superate', 'Model');

/**
 * Superate Test Case
 *
 */
class SuperateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.superate',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Superate = ClassRegistry::init('Superate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Superate);

		parent::tearDown();
	}

}
