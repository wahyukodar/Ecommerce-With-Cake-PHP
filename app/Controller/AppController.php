<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {
    public $components = array(
        //'DebugKit.Toolbar',
        'Cookie',
        'Session',
        'Auth' => array(
        'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
        'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
        'logoutsRedirect' => array('controller' => 'index.html'),
        'authError' => 'You must be logged in to view this page.',
        'loginError' => 'Invalid Username or Password entered, please try again.'
    ));
    
    public function beforeFilter() {
        //$this->Auth->allow('index', 'view'); // izinkan semua index pada semua controller bisa dibuka, dan juga view nya
        $this->Auth->allow('home','index','update','delete');
        $isAdmin = !empty($this->request->params['admin']);
        Configure::write('Routing.admin.active', $isAdmin);
        
        
        if(!$isAdmin){ // jika sedang TIDAK di halaman admin, maka load modul untuk halaman home
            $this->loadModel('Category');
            $datacategory = $this->Category->find('all');
            $this->set(compact('datacategory'));
            $this->loadModel('Product');
            $dataproduct = $this->Product->find('all');
            $this->set(compact('dataproduct'));
            $this->loadModel('Cart');
            $this->UpdateCart();
        }
        $this->Cookie->write('session_id', $this->Session->id(),false,null);
        /*if(empty($this->Cookie->read('session_id'))){
        $this->Cookie->write('session_id', $this->Session->id(),false,null);
        }*/
        $this->set('sessionID', $this->Cookie->read('session_id')); // set untuk bisa diakses view 
    }
    
    public function isAuthorized($user) {
    // Here is where we should verify the role and give access based on role
     
    return true;
    }
    
    public function UpdateCart(){
        $session_id = $this->Cookie->read('session_id');
        $datacarthome = $this->Cart->find('all', array('conditions'=>array('Cart.session_id'=>$session_id)));
        $this->set(compact('datacarthome'));
        $datasumhome = $this->Cart->find('all', array(
        'conditions' => array(
        'Cart.session_id' => $session_id),
        'fields' => array('sum(Product.cost*Cart.qty) as subtotalhome'
                )
            )
        );
        $this->set(compact('datasumhome'));
    }
}