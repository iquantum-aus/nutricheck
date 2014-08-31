<?php
/**
 * SelectedAnswerLogFixture
 *
 */
class SelectedAnswerLogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'choice_value' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'question_id' => array('type' => 'biginteger', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'biginteger', 'null' => true, 'default' => null),
		'performed_time' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
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
			'choice_value' => 1,
			'question_id' => '',
			'user_id' => '',
			'performed_time' => 1,
			'created' => '2014-08-31 13:11:36',
			'modified' => '2014-08-31 13:11:36',
			'status' => 1
		),
	);

}
