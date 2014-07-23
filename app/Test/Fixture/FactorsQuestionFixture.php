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
		'factor_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'question_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
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
			'factor_id' => 1,
			'question_id' => 1,
			'multiplier' => 1
		),
	);

}
