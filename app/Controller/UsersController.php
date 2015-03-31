<?php
class UsersController extends AppController {
    var $paginate = array(
        'limit' => 2,
        'order' => array(
        'users.firstname' => 'asc'
        )
    );
    
    public function login(){
        $this->redirect(array('controller' => 'index.html')); 
    }
    
	public function admin_index() {
        $data = $this->paginate('User');
        $this->set('users', $data);
	}
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_login','admin_add'); // mengizinkan view add dan login dapat dilihat
    }

    public function admin_login() {
         // jika user sudah login
        if($this->Session->check('Auth.User')){
            $this->redirect(array('action' => 'index'));      
        }
         
        // jika user belum login
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect(array('controller' => 'users','action' => 'admin_index'));
            } else {
                $this->Session->setFlash(__('Invalid username or password'));
            }
        } 
    }

    public function admin_logout() {
        return $this->redirect($this->Auth->logout());
    }
 
	public function admin_add(){
    $this->request->data['Post']['user_id'] = $this->Auth->user('id');
		if ($this->request->is('post')){
			if ($this->User->save($this->request->data)){
				$this->Session->setFlash('User was added.');
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash('Unable to add user. Please, try again.');
			}
		}
	}

	public function admin_edit() {
		$id = $this->request->params['pass'][0];
		$this->User->id = $id;
		if( $this->User->exists() ){
			if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
				if( $this->User->save( $this->request->data ) ){
					$this->Session->setFlash('User was edited.');
					$this->redirect(array('action' => 'index'));
				}else{
					$this->Session->setFlash('Unable to edit user. Please, try again.');
				}
			}else{
				$this->request->data = $this->User->read();
			}
		}
        else{
			$this->Session->setFlash('The user you are trying to edit does not exist.');
			$this->redirect(array('action' => 'index'));
		}
	}

	public function admin_delete() {
		$id = $this->request->params['pass'][0];
		if( $this->request->is('get') ){
			$this->Session->setFlash('Delete method is not allowed.');
			$this->redirect(array('action' => 'index'));
		}
        else{
			if( !$id ) {
				$this->Session->setFlash('Invalid id for user');
				$this->redirect(array('action'=>'index'));
				
			}
            else{
				if( $this->User->delete( $id ) ){
					$this->Session->setFlash('User was deleted.');
					$this->redirect(array('action'=>'index'));
					
				}
                else{	
					$this->Session->setFlash('Unable to delete user.');
					$this->redirect(array('action' => 'index'));
				}
			}
		}
	}
}
?>
