<?php
App::uses('AnalysisResult', 'Model');

/**
 * AnalysisResult Test Case
 *
 */
class AnalysisResultTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.analysis_result',
		'app.factors',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AnalysisResult = ClassRegistry::init('AnalysisResult');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AnalysisResult);

		parent::tearDown();
	}

}
