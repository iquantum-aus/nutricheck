<?php
App::uses('PageAccessFlag', 'Model');

/**
 * PageAccessFlag Test Case
 *
 */
class PageAccessFlagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.page_access_flag',
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
		$this->PageAccessFlag = ClassRegistry::init('PageAccessFlag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PageAccessFlag);

		parent::tearDown();
	}

}
