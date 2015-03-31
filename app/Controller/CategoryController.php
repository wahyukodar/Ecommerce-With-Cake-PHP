<?php
class CategoryController extends AppController {
	public function index() {
        $id_cat = $this->request->params['pass'][0];
        $this->loadModel('Percategory');
        $this->paginate = array(
        'Percategory' => array('limit' => 1,
                                'conditions'=>array('Percategory.id'=>$id_cat)
                          ));
        $dataCategory = $this->paginate('Percategory');
        $this->set(compact('dataCategory'));
	}
}
?>