<?php
/**
 * PrescriptionFixture
 *
 */
class PrescriptionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'functional_disturbance' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'1_20' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'21_40' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'41_60' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'61_80' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'81_100' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'maximum_dosage' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => null),
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
			'id' => 1,
			'functional_disturbance' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'1_20' => 1,
			'21_40' => 1,
			'41_60' => 1,
			'61_80' => 1,
			'81_100' => 1,
			'maximum_dosage' => 1,
			'created' => '2014-05-21 03:17:50',
			'modified' => '2014-05-21 03:17:50',
			'status' => 1
		),
	);

}
