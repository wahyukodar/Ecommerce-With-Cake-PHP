<?php
    echo $this->Session->flash('auth');
    echo $this->Form->create('User'); // hati2 sama nama ini kalau salah maka gak akan terhubung sama modelnya
    echo $this->Form->inputs(array(
    'legend' => __('Login'),
    'username',
    'password'
    ));
    echo $this->Form->end(__('Login'));
?>