<?php
App::uses('UserAccessLog', 'Model');

/**
 * UserAccessLog Test Case
 *
 */
class UserAccessLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_access_log',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserAccessLog = ClassRegistry::init('UserAccessLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserAccessLog);

		parent::tearDown();
	}

}
