<?php
App::uses('Answer', 'Model');

/**
 * Answer Test Case
 */
class AnswerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.answer',
		'app.question',
		'app.survey',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Answer = ClassRegistry::init('Answer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Answer);

		parent::tearDown();
	}

}
