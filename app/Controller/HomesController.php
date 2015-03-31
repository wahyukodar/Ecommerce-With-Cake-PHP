<?php
class HomesController extends AppController {

	public function home() {
	}
    public function logout(){
    return $this->redirect($this->Auth->logout());
    }
}
?>
