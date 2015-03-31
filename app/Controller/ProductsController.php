<?php
class ProductsController extends AppController {
    var $paginate = array(
        'limit' => 20,
        'order' => array(
        'product.product_name' => 'desc'
        )
    );
	public function admin_index() {
        $data = $this->paginate('Product');
        $this->set('dataproducts', $data);
	}
	
	public function admin_add(){
    $this->loadModel('Category');
	$data = $this->Category->find('list', array('fields' => array('id', 'name_category')));
    $this->set('clients', $data);
		if ($this->request->is('post')){
			if ($this->Product->save($this->request->data)){
				$this->Session->setFlash('Product was added.');
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash('Unable to add product. Please, try again.');
			}
		}
	}

	public function admin_edit() {
        $this->loadModel('Category');
        $data = $this->Category->find('list', array('fields' => array('id', 'name_category')));
        $this->set('clients', $data);
        
		$id = $this->request->params['pass'][0];
		$this->Product->id = $id;
		
		if( $this->Product->exists() ){
		
			if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
				if( $this->Product->save( $this->request->data ) ){
					$this->Session->setFlash('Product was edited.');
					$this->redirect(array('action' => 'index'));
				}
                else{
					$this->Session->setFlash('Unable to edit products. Please, try again.');
				}
			}
            else{
				$this->request->data = $this->Product->read();
			}
		}
        else{
			$this->Session->setFlash('The products you are trying to edit does not exist.');
			$this->redirect(array('action' => 'index'));
		}
	}

	public function admin_delete() {
		$id = $this->request->params['pass'][0];
		if( $this->request->is('get') ){
			$this->Session->setFlash('Delete method is not allowed.');
			$this->redirect(array('action' => 'index'));
		}else{
			if( !$id ) {
				$this->Session->setFlash('Invalid id for products');
				$this->redirect(array('action'=>'index'));
			}
            else{
				if( $this->Product->delete( $id ) ){
					$this->Session->setFlash('Product was deleted.');
					$this->redirect(array('action'=>'index'));
				}
                else{	
					$this->Session->setFlash('Unable to delete products.');
					$this->redirect(array('action' => 'index'));
				}
			}
		}
	}
}
?>
