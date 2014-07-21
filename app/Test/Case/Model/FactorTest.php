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
		'app.user',
		'app.group',
		'app.user_profile',
		'app.answer',
		'app.question',
		'app.temp_answer',
		'app.choice',
		'app.questions',
		'app.factors_question',
		'app.qgroup',
		'app.questions_qgroup',
		'app.vitamin',
		'app.users_vitamin',
		'app.prescription'
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
