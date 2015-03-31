<?php
class CartsController extends AppController {
public $components = array('RequestHandler');
	public function index() {
    if(!empty($this->request->params['pass'][0])){
    $id_product = $this->request->params['pass'][0];
    }
    // $session_id = $this->Session->id(); jangan menggunakan session karna kalau sudah login dan dapat auth maka session di regenerate
    $session_id = $this->Cookie->read('session_id'); // gunakan cookie
        if(!empty($id_product)){
            if($this->request->is('post')){
                $data = array("id_product"=>$id_product,"session_id"=>$session_id,"qty"=>"1");
                $cek_data = $this->Cart->find('count',array('conditions'=>array('Cart.session_id'=>$session_id,'id_product'=>$id_product)));
                
                if($cek_data>0){ // data sudah ada maka update quantity
                    $orderCurrent = $this->Cart->find('all',array('conditions'=>array('Cart.session_id'=>$session_id,'id_product'=>$id_product)));
                    $id = $orderCurrent[0]['Cart']['id'];
                    $qty = $orderCurrent[0]['Cart']['qty']+1; // ditambah 1
                    $this->Cart->id = $id;
                    if($this->Cart->exists()){
                        $data = array("qty"=>$qty);
                        $this->Cart->save($data);
                    }
                }
                else{
                    if ($this->Cart->save($data)){
                        
                    }
                    else{
                        // error save
                    }
                }
                $datacart = $this->Cart->find('all',array('conditions'=>array('Cart.session_id'=>$session_id)));
                $this->set('datacart', $datacart);

                $this->UpdateCart();
            }
            else{
                $datacart = $this->Cart->find('all', 
                   array('conditions'=>array('Cart.session_id'=>$session_id)));
                $this->set('datacart', $datacart);
            }
        }
        else{   // without id product
                $datacart = $this->Cart->find('all', 
                   array('conditions'=>array('Cart.session_id'=>$session_id)));
                $this->set('datacart', $datacart);
        }
	}
    
    public function update(){
         if ($this->request->is('Ajax')){
            //$session_id = $this->Session->id(); 
            // untuk keamanan seharusnya sebelum diupdate, pastikan dulu data pada database sessionnya sama dengan session ini
            $session_id = $this->Cookie->read('session_id');
            $this->autoRender = false; // harus dipanggil false jadi tidak butuh .ctp
            $id = $_POST['id'];
            $qty = $_POST['qty'];
            $this->Cart->id = $id;
            if($this->Cart->exists()){
            $data = array("qty"=>$qty);
                if($this->Cart->save($data)){
                    $data['message'] = "Success Updated";
                    $data['update'] = "ok";
                    $datacarthome1 = $this->Cart->find('all', 
                    array('conditions'=>array('Cart.session_id'=>$session_id)));
                    $datasumhome2 = $this->Cart->find('all', array(
                    'conditions' => array(
                    'Cart.session_id' => $session_id),
                    'fields' => array('sum(Product.cost*Cart.qty) as subtotalhome'
                    )
                    )
                    );
                    $data['subtotalhomes'] = $datasumhome2[0][0]['subtotalhome'];
                    $data['jmlitem'] = count($datacarthome1);
                }
                else{
                    $data['message'] = "Fail Updated";
                }
            }
            else{
                $data['message'] = "Product not exist";
            }
        }
        echo json_encode($data);
    }
    
    public function delete(){
         if ($this->request->is('Ajax')){
            $session_id = $this->Session->id();
            $this->autoRender = false; // harus dipanggil false jadi tidak butuh .ctp
            $id = $_POST['id'];
            if( !$id ) {
                $data['message'] = "Invalid id for product";
            }
            else{
                if( $this->Cart->delete( $id ) ){
                    $session_id = $this->Cookie->read('session_id');
                    $data['message'] = "Success Deleted";
                    $data['update'] = "ok";
                    $datacarthome1 = $this->Cart->find('all', 
                    array('conditions'=>array('Cart.session_id'=>$session_id)));
                    $datasumhome2 = $this->Cart->find('all', array(
                    'conditions' => array(
                    'Cart.session_id' => $session_id),
                    'fields' => array('sum(Product.cost*Cart.qty) as subtotalhome'
                    )
                    )
                    );
                    $data['subtotalhomes'] = $datasumhome2[0][0]['subtotalhome'];
                    $data['jmlitem'] = count($datacarthome1);
                }
                else{
                    $data['message'] = "Unable Deleted";
                }
            }
        }
        echo json_encode($data);
    }
    
}
?>
