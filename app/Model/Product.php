<?php
class Product extends AppModel {
    var $belongsTo = array('Category' => array('className' => 'Category','foreignKey' => 'id_cat'));
    
	public $validate = array(
		'filename' => array(
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Something went wrong with the file upload',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
			/*'mimeType' => array(
				'rule' => array('mimeType', array('image/gif','image/png','image/jpg','image/jpeg')),
				'message' => 'Invalid file, only images allowed',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),*/
			// custom callback to deal with the file upload
			'processUpload' => array(
				'rule' => 'processUpload',
				'message' => 'Something went wrong processing your file',
				'required' => FALSE,
				'allowEmpty' => TRUE,
				'last' => TRUE,
			)
		)
	);
    
	public $uploadDir = 'items';
	public function beforeValidate($options = array()) {
		if (!empty($this->data[$this->alias]['filename']['error']) && $this->data[$this->alias]['filename']['error']==4 && $this->data[$this->alias]['filename']['size']==0) {
			unset($this->data[$this->alias]['filename']);
		}
		return parent::beforeValidate($options);
	}

	public function beforeSave($options = array()) {
		if (!empty($this->data[$this->alias]['filepath'])) {
			$this->data[$this->alias]['filename'] = $this->data[$this->alias]['filepath'];
		}
		return parent::beforeSave($options);
	}
    
	public function processUpload($check=array()) {
		if (!empty($check['filename']['tmp_name'])) {
        
			if (!is_uploaded_file($check['filename']['tmp_name'])) {
				return FALSE;
			}
            
			$filename = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(pathinfo($check['filename']['name'], PATHINFO_FILENAME)).'.'.pathinfo($check['filename']['name'], PATHINFO_EXTENSION);
			
            if (!move_uploaded_file($check['filename']['tmp_name'], $filename)) {
				return FALSE;
			} 
            else {
				$this->data[$this->alias]['filepath'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename) );
			}
		}
		return TRUE;
	}
}
?>