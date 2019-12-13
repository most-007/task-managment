<?php
App::uses('AppModel', 'Model');
/**
 * Question Model
 *
 * @property Survey $Survey
 * @property ParentQ $ParentQ
 * @property Answer $Answer
 */
class Question extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'survey_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'question' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Survey' => array(
			'className' => 'Survey',
			'foreignKey' => 'survey_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		// 'ParentQ' => array(
		// 	'className' => 'Question',
		// 	'foreignKey' => 'parent_q_id',
		// 	'conditions' => '',
		// 	'fields' => '',
		// 	'order' => ''
		// )
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Answer' => array(
			'className' => 'Answer',
			'foreignKey' => 'question_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
