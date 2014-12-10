<?php
/**
 * SelectedFactorFixture
 *
 */
class SelectedFactorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'performed_check_id' => array('type' => 'biginteger', 'null' => false, 'default' => null),
		'factor_id' => array('type' => 'biginteger', 'null' => false, 'default' => null),
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
			'performed_check_id' => '',
			'factor_id' => '',
			'created' => '2014-11-19 01:14:26',
			'modified' => '2014-11-19 01:14:26',
			'status' => 1
		),
	);

}
