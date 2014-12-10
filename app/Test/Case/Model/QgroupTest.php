<?php
App::uses('Qgroup', 'Model');

/**
 * Qgroup Test Case
 *
 */
class QgroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.qgroup',
		'app.question',
		'app.user',
		'app.group',
		'app.user_profile',
		'app.vitamin',
		'app.users_vitamin',
		'app.answer',
		'app.choice',
		'app.questions',
		'app.temp_answer',
		'app.factor',
		'app.factors_question',
		'app.questions_qgroup'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Qgroup = ClassRegistry::init('Qgroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Qgroup);

		parent::tearDown();
	}

}
