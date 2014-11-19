<?php
App::uses('SelectedFactor', 'Model');

/**
 * SelectedFactor Test Case
 *
 */
class SelectedFactorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.selected_factor',
		'app.performed_check',
		'app.user',
		'app.group',
		'app.video',
		'app.user_profile',
		'app.answer',
		'app.question',
		'app.temp_answer',
		'app.factor',
		'app.factor_type',
		'app.nutritional_guide',
		'app.nutritional_guide_type',
		'app.prescription',
		'app.base_nutrient',
		'app.factors_question',
		'app.choice',
		'app.questions',
		'app.qgroup',
		'app.questions_qgroup',
		'app.vitamin',
		'app.users_vitamin'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SelectedFactor = ClassRegistry::init('SelectedFactor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SelectedFactor);

		parent::tearDown();
	}

}
