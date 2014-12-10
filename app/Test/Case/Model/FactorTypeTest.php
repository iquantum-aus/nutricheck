<?php
App::uses('FactorType', 'Model');

/**
 * FactorType Test Case
 *
 */
class FactorTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.factor_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FactorType = ClassRegistry::init('FactorType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FactorType);

		parent::tearDown();
	}

}
