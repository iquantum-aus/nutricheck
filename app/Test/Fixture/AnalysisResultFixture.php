<?php
/**
 * AnalysisResultFixture
 *
 */
class AnalysisResultFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'factors_id' => array('type' => 'biginteger', 'null' => false, 'default' => null),
		'user_id' => array('type' => 'biginteger', 'null' => false, 'default' => null),
		'score' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
			'factors_id' => '',
			'user_id' => '',
			'score' => 1,
			'created' => '2013-12-21 13:30:46',
			'modified' => '2013-12-21 13:30:46',
			'status' => 1
		),
	);

}
