<?php
App::uses('SelectedAnswerLog', 'Model');

/**
 * SelectedAnswerLog Test Case
 *
 */
class SelectedAnswerLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.selected_answer_log',
		'app.question',
		'app.user',
		'app.group',
		'app.video',
		'app.user_profile',
		'app.answer',
		'app.choice',
		'app.questions',
		'app.vitamin',
		'app.users_vitamin',
		'app.temp_answer',
		'app.factor',
		'app.factor_type',
		'app.nutritional_guide',
		'app.nutritional_guide_type',
		'app.prescription',
		'app.factors_question',
		'app.qgroup',
		'app.questions_qgroup'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SelectedAnswerLog = ClassRegistry::init('SelectedAnswerLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SelectedAnswerLog);

		parent::tearDown();
	}

}
