<?php
App::uses('TempAnswer', 'Model');

/**
 * TempAnswer Test Case
 *
 */
class TempAnswerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.temp_answer',
		'app.questions',
		'app.factors',
		'app.choice',
		'app.answer',
		'app.users',
		'app.performed_checks'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TempAnswer = ClassRegistry::init('TempAnswer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TempAnswer);

		parent::tearDown();
	}

}
