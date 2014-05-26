<?php
App::uses('Hermano', 'Model');

/**
 * Hermano Test Case
 *
 */
class HermanoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.hermano',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Hermano = ClassRegistry::init('Hermano');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Hermano);

		parent::tearDown();
	}

}
