<?php
App::uses('PrivacyPolicyConfirmation', 'Model');

/**
 * PrivacyPolicyConfirmation Test Case
 *
 */
class PrivacyPolicyConfirmationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.privacy_policy_confirmation',
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
		$this->PrivacyPolicyConfirmation = ClassRegistry::init('PrivacyPolicyConfirmation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PrivacyPolicyConfirmation);

		parent::tearDown();
	}

}
