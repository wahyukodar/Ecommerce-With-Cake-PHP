<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');

if(Configure::read('Routing.admin.active')){
    require_once "admin.ctp";
}
else{
    require_once "front.ctp";
}
?>
