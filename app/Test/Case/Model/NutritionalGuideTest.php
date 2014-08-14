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
		'app.users'
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
