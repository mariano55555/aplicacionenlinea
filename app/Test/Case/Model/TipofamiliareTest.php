<?php
App::uses('Tipofamiliare', 'Model');

/**
 * Tipofamiliare Test Case
 *
 */
class TipofamiliareTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipofamiliare'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipofamiliare = ClassRegistry::init('Tipofamiliare');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipofamiliare);

		parent::tearDown();
	}

}
