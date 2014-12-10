<?php
App::uses('PerformedCheck', 'Model');

/**
 * PerformedCheck Test Case
 *
 */
class PerformedCheckTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.performed_check'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PerformedCheck = ClassRegistry::init('PerformedCheck');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PerformedCheck);

		parent::tearDown();
	}

}
