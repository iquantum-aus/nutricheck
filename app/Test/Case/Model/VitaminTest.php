<?php
App::uses('Vitamin', 'Model');

/**
 * Vitamin Test Case
 *
 */
class VitaminTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vitamin',
		'app.user',
		'app.groups',
		'app.users_vitamin'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Vitamin = ClassRegistry::init('Vitamin');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Vitamin);

		parent::tearDown();
	}

}
