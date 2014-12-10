<?php
App::uses('NutritionalGuideType', 'Model');

/**
 * NutritionalGuideType Test Case
 *
 */
class NutritionalGuideTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.nutritional_guide_type',
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
		'app.nutritional_guide',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->NutritionalGuideType = ClassRegistry::init('NutritionalGuideType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NutritionalGuideType);

		parent::tearDown();
	}

}
