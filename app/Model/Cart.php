<?php
class Cart extends AppModel { // nama filenya Cart.php, jangan sampai namanya Carts.php, karen useTable tidak akan berfungsi
    var $useTable = "order_temp";
    var $belongsTo = array(                     // belongsTo adalah many to one
    'Product' => array(
                    'className' => 'Product',
                    'foreignKey' => false,
                    'conditions' => array('Cart.id_product = Product.id')
                    ),
    'Category' => array(
                    'className' => 'Category',
                    'foreignKey' => false,
                    'conditions' => array('Product.id_cat = Category.id')
                    )
    );
} // INTINYA TABEL ORDER TEMP DIJOIN SAMA TABLE PRODUCT DAN CATEGORY
?>