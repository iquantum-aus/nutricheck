<?php
/**
 * TempAnswerFixture
 *
 */
class TempAnswerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'ip_address' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'question_id' => array('type' => 'biginteger', 'null' => false, 'default' => null),
		'factor_id' => array('type' => 'biginteger', 'null' => true, 'default' => null),
		'choice_id' => array('type' => 'biginteger', 'null' => true, 'default' => null),
		'rank' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'answer' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '',
			'ip_address' => 'Lorem ipsum dolor ',
			'question_id' => '',
			'factor_id' => '',
			'choice_id' => '',
			'rank' => 1,
			'answer' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-05-08 04:45:05',
			'modified' => '2014-05-08 04:45:05',
			'status' => 1
		),
	);

}
