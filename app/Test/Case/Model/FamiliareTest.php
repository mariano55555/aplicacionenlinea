<?php
App::uses('Familiare', 'Model');

/**
 * Familiare Test Case
 *
 */
class FamiliareTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.familiare',
		'app.tipofamiliar',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Familiare = ClassRegistry::init('Familiare');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Familiare);

		parent::tearDown();
	}

}
