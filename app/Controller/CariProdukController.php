<?php
class CariProdukController extends AppController {
    public $name = 'Category'; // setelah function index diproses, maka datanya ditampilkan ke view pada folder Category, jadi
    // satu .ctp atau satu view bisa dipakai untuk view percategory dan view berdasarkan pencarian
	public function index() {
        $kata=""; // define
        if(isset($this->request->data['Cari']['Search'])){
        $kata=$this->request->data['Cari']['Search'];
        }
        $this->loadModel('Percategory');
                   
        $this->paginate = array(
        'Percategory' => array('limit' => 2,
                                'conditions'=>array('Product.product_name LIKE'=>"%$kata%")
                          ));
        $dataCategory = $this->paginate('Percategory');
        $this->set(compact('dataCategory'));
	}
}
?>
