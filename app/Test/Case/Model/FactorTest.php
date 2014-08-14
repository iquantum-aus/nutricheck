<?php
App::uses('Factor', 'Model');

/**
 * Factor Test Case
 *
 */
class FactorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.factor',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Factor = ClassRegistry::init('Factor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Factor);

		parent::tearDown();
	}

}
