<?php
class LoginsController extends AppController {
  var $name = 'Login';
  var $components = array('Auth');
  function login() {
  }
  function logout() {
    $this->redirect($this->Auth->logout());
  }
  function index() {
  }
}
?>
