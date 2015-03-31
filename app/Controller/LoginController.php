<?php
class LoginController extends AppController {
  function index() {
    if(isset($this->request->query['reaccessthis'])){ // diambil dari kiriman controller checkout, buat ngebalikin dari login ke checkout
    $accescheckout = $this->request->query['reaccessthis'];
    }
        if ($this->request->is('post')) {
        $username = $this->request->data['Login']['username'];
        $password = $this->request->data['Login']['password'];
        $this->request->data = array("User"=>array("username"=>$username,"password"=>$password ));
            if ($this->Auth->login()) {
                // 1. load model user, untuk mengambil id member
                $this->loadModel('User');
                $datauserlogin = $this->User->find('all', 
                array('conditions'=>array('User.username'=>$username)));
                $id_member = $datauserlogin[0]['User']['id'];
                $this->Session->write('id_member',$id_member);
                if($accescheckout=="1"){
                    $this->redirect(array('controller' => 'checkout'));
                }
                else{
                    $this->redirect(array('controller' => 'index.html'));
                }
            } else {
                //$this->Session->setFlash(__('Invalid username or password'));
            }
        } 
  }
}
?>
