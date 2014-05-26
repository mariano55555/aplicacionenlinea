<?php
App::uses('Otraubicacione', 'Model');

/**
 * Otraubicacione Test Case
 *
 */
class OtraubicacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.otraubicacione',
		'app.pais'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Otraubicacione = ClassRegistry::init('Otraubicacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Otraubicacione);

		parent::tearDown();
	}

}
