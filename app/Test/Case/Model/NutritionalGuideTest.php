<?php
App::uses('NutritionalGuide', 'Model');

/**
 * NutritionalGuide Test Case
 *
 */
class NutritionalGuideTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.nutritional_guide',
		'app.user',
		'app.group',
		'app.user_profile',
		'app.answer',
		'app.question',
		'app.temp_answer',
		'app.factor',
		'app.prescription',
		'app.factors_question',
		'app.choice',
		'app.questions',
		'app.qgroup',
		'app.questions_qgroup',
		'app.vitamin',
		'app.users_vitamin',
		'app.nutritional_guide_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->NutritionalGuide = ClassRegistry::init('NutritionalGuide');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NutritionalGuide);

		parent::tearDown();
	}

}
