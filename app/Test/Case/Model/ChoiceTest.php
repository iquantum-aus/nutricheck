<?php
App::uses('Choice', 'Model');

/**
 * Choice Test Case
 *
 */
class ChoiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.choice',
		'app.questions',
		'app.answer',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Choice = ClassRegistry::init('Choice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Choice);

		parent::tearDown();
	}

}
