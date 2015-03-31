<div id="list_all">
	<?php echo $this->Html->link( 'List Users', '/'.Configure::read('Routing.adminfolder').'/users/index', array( 'class' => 'button' ) ); ?>
</div>
<div id="clearer"></div>
<fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
<?php 
    echo $this->Form->create('User');

    echo $this->Form->input('firstname');
    echo $this->Form->input('lastname');
    echo $this->Form->input('email');
    echo $this->Form->input('username');
    echo $this->Form->input('password', array('type'=>'password'));
    echo $this->Form->input('role', array(
        'options' => array('admin' => 'Admin', 'member' => 'Member')
    ));

    echo $this->Form->end(__('Submit'));
?>
 </fieldset>	