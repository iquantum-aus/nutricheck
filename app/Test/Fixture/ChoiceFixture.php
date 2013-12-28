<?php
/**
 * ChoiceFixture
 *
 */
class ChoiceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 160, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'questions_id' => array('type' => 'biginteger', 'null' => false, 'default' => null),
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
			'title' => 'Lorem ipsum dolor sit amet',
			'questions_id' => '',
			'created' => '2013-12-21 13:30:00',
			'modified' => '2013-12-21 13:30:00',
			'status' => 1
		),
	);

}
