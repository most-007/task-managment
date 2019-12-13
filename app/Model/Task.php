<?php

class Task extends AppModel {

    public $validate = array(
		'task' => array(
			'minLength' => array(
				'rule' => array('minLength', '10'),
				'message' => 'task should be 10 characters at least!',
			
			),
		),
    );
    
    public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
    );
    

}