<?php
App::uses('BaseNutrient', 'Model');

/**
 * BaseNutrient Test Case
 *
 */
class BaseNutrientTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.base_nutrient'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BaseNutrient = ClassRegistry::init('BaseNutrient');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BaseNutrient);

		parent::tearDown();
	}

}
