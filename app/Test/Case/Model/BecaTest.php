<?php
App::uses('Beca', 'Model');

/**
 * Beca Test Case
 *
 */
class BecaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.beca',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Beca = ClassRegistry::init('Beca');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Beca);

		parent::tearDown();
	}

}
