<?php
/**
 * AnswerFixture
 *
 */
class AnswerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'biginteger', 'null' => false, 'default' => null),
		'question_id' => array('type' => 'biginteger', 'null' => false, 'default' => null),
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
			'user_id' => '',
			'question_id' => '',
			'choice_id' => '',
			'rank' => 1,
			'answer' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-12-21 13:28:01',
			'modified' => '2013-12-21 13:28:01',
			'status' => 1
		),
	);

}
