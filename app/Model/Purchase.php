<?php
class Purchase extends AppModel {
    var $belongsTo = array(                     // belongsTo adalah many to one
    'Product' => array(
                    'className' => 'Product',
                    'foreignKey' => false,
                    'conditions' => array('Purchase.id_product = Product.id')
                    ),
    'User' => array(
                    'className' => 'User',
                    'foreignKey' => false,
                    'conditions' => array('Purchase.id_member = User.id')
                    ),
    'Category' => array(
                    'className' => 'Category',
                    'foreignKey' => false,
                    'conditions' => array('Product.id_cat = Category.id')
                    )
    );
}
?>