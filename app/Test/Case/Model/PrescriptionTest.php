<?php
App::uses('Prescription', 'Model');

/**
 * Prescription Test Case
 *
 */
class PrescriptionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.prescription'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Prescription = ClassRegistry::init('Prescription');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Prescription);

		parent::tearDown();
	}

}
