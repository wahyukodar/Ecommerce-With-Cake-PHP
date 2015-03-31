<?php
class CheckoutController extends AppController {
	public function index() {
            if ($this->Auth->login()) {
                // 1. ambil session id
                $session_id = $this->Cookie->read('session_id');
                // 2. get data dari temporary order berdasarkan session id
                $datacheckout = $this->Cart->find('all', 
                array('conditions'=>array('Cart.session_id'=>$session_id)));
                $id_member = $this->Session->read('id_member');
                // 3. pindahkan dari temporary order ke purchase table di database
                //print_r($datacheckout);
                $data = array();
                foreach($datacheckout as $checkout){ // looping sebanyak orderan
                    $data_ = array('Checkout'=>array("id_product"=>$checkout['Cart']['id_product'],"id_member"=>$id_member,"qty"=>$checkout['Cart']['qty']));
                    array_push($data, $data_);
                }
                if($this->Checkout->saveMany($data)){ // simpan ke table purchase
                // 4. delete semua yg ada di temporary
                $this->Cart->deleteAll(array('Cart.session_id' => $session_id), false);
                $this->UpdateCart();
                }
                
            } 
            else {
                $this->redirect(array('controller' => 'login','action' => 'index',
                '?' => array('reaccessthis' => '1')
                )); // gw tambahin parameter reaccessthis
                // jadi kalo dia mau check dalam kondisi belum login maka dia dikirim ke halaman login, setelah
                // login berhasil maka dia dikirim lagi ke controller checkout ini.
            }
	}
}
?>
