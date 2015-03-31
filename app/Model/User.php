<?php
//App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth'); // import fungsi hash buat encrypt password saat daftar/add
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'member')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
    /*public function beforeSave($options = array()) { // sebelum user baru disimpan maka passwordnya diencrypt lalu masuk ke database
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher(); // buat objek blowfishhash
            $this->data[$this->alias]['password'] = $passwordHasher->hash( // gunakan objek blowfishhash untuk encrypt passwordnya
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }*/
    
    public function beforeSave($options = array()) {
		// hash our password
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
	
		// fallback to our parent
		return parent::beforeSave($options);
	}
}
?>