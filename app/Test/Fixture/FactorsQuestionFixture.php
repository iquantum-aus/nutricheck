<?php
/**
 * FactorsQuestionFixture
 *
 */
class FactorsQuestionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'factors_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'questions_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'multiplier' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '',
			'factors_id' => 1,
			'questions_id' => 1,
			'multiplier' => 1
		),
	);

}
