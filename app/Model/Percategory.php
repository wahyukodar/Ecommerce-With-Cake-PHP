<?php
class Percategory extends AppModel {
    /*
    1. Table pada databasesnya bernama category.
    2. Nama model ini Category
    Jika tidak ingin menggunakan $useTable maka ganti table pada databasenya menjadi categories
    */
	public $useTable = 'category';
    var $belongsTo = array(                     // belongsTo adalah many to one
    'Product' => array(
                    'className' => 'Product',
                    'foreignKey' => false,
                    'conditions' => array('Percategory.id = Product.id_cat')
                    )
    );
}
?>