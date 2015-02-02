<?php
App::uses('UserAlert', 'Model');

/**
 * UserAlert Test Case
 *
 */
class UserAlertTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_alert',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserAlert = ClassRegistry::init('UserAlert');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserAlert);

		parent::tearDown();
	}

}
