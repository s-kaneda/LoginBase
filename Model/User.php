<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * User Model
 *
 */
class User extends AppModel {

    public function beforeSave($options = array()) {
//        var_dump($this->alias);
//        exit;
    if (isset($this->data['User']['password'])) {
        
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data['User']['password'] = $passwordHasher->hash(
            $this->data['User']['password']
        );
    }
    return true;
}
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
                //フィールド名            
		'username' => array(
                        //  バリデーション名                  
			'Blank' => array(
                                //バリデーションのルール                            
				'rule' => array('notBlank'),
				'message' => 'メッセージが入力されてません',
				//'allowEmpty' => false,
				'required' => 'ture',
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'パスワードが入力されてません',
				//'allowEmpty' => false,
				'required' => 'ture',
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'role' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => '権限が入力されてません',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
