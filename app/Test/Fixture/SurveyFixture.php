<?php
/**
 * Survey Fixture
 */
class SurveyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf16_general_ci', 'charset' => 'utf16'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'surveys_author_id_idx' => array('column' => 'user_id', 'unique' => 0),
			'author_id' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf16', 'collate' => 'utf16_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1
		),
	);

}
