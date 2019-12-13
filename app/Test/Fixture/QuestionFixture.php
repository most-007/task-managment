<?php
/**
 * Question Fixture
 */
class QuestionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'survey_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'text' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf16_general_ci', 'charset' => 'utf16'),
		'on_yes_no' => array('type' => 'enum(\'yes\',\'no\')', 'null' => true, 'default' => null, 'collate' => 'utf16_general_ci', 'charset' => 'utf16'),
		'parent_q_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'questions_surveys_fk' => array('column' => 'survey_id', 'unique' => 0),
			'questions_questions_fk' => array('column' => 'parent_q_id', 'unique' => 0)
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
			'survey_id' => 1,
			'text' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'on_yes_no' => '',
			'parent_q_id' => 1
		),
	);

}
