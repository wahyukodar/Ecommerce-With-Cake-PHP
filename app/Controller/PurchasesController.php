<?php
class PurchasesController extends AppController {
    var $paginate = array(
        'limit' => 2,
        'order' => array(
        'purchases.id' => 'desc'
        )
    );
	public function admin_index() {
        $data = $this->paginate('Purchase');
        $this->set('datapurchases', $data);
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
				if( $this->Purchase->delete( $id ) ){
					$this->Session->setFlash('Purchase was deleted.');
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
