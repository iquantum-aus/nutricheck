<?php
App::uses('FactorsQuestion', 'Model');

/**
 * FactorsQuestion Test Case
 *
 */
class FactorsQuestionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.factors_question',
		'app.factors',
		'app.questions'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FactorsQuestion = ClassRegistry::init('FactorsQuestion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FactorsQuestion);

		parent::tearDown();
	}

}
