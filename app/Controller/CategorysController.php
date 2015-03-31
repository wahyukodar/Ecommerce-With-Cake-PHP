<?php
class CategorysController extends AppController {
    /*
    1. nama controllernya CategorysController, maka nama folder view yang dituju adalah Categorys.  
    Jika nama folder view bukan Categorys, maka gunakan:
	public $name = 'Category';
    */
    var $paginate = array(
        'limit' => 2,
        'order' => array(
        'category.name_category' => 'asc'
        )
    );
	public function admin_index() {
        $data = $this->paginate('Category');
        $this->set('category', $data);
	}
	
	public function admin_add(){
		if ($this->request->is('post')){
			if ($this->Category->save($this->request->data)){
				$this->Session->setFlash('Category was added.');
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash('Unable to add category. Please, try again.');
			}
		}
	}

	public function admin_edit() {
		$id_cat = $this->request->params['pass'][0];
		$this->Category->id = $id_cat;
		if( $this->Category->exists() ){ // cakephp default hanya membaca field id, jika nama field pd databse misal id_cat maka tidak dapat dibaca
			if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
				if( $this->Category->save( $this->request->data ) ){
					$this->Session->setFlash('Category was edited.');
					$this->redirect(array('action' => 'index'));
				}else{
					$this->Session->setFlash('Unable to edit user. Please, try again.');
				}
			}else{
				$this->request->data = $this->Category->read();
			}
			
		}else{
			$this->Session->setFlash('The category you are trying to edit does not exist.');
			$this->redirect(array('action' => 'index'));
		}
	}

	public function admin_delete() {
		$id_category = $this->request->params['pass'][0];
		if( $this->request->is('get') ){
			$this->Session->setFlash('Delete method is not allowed.');
			$this->redirect(array('action' => 'index'));
		}else{
			if( !$id_category ) {
				$this->Session->setFlash('Invalid id for category');
				$this->redirect(array('action'=>'index'));
				
			}else{
				if( $this->Category->delete( $id_category ) ){
					$this->Session->setFlash('Category was deleted.');
					$this->redirect(array('action'=>'index'));
					
				}else{	
					$this->Session->setFlash('Unable to delete category.');
					$this->redirect(array('action' => 'index'));
				}
			}
		}
	}
}
?>
