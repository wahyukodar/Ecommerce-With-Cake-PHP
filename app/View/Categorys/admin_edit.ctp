<div id="list_all">
	<?php echo $this->Html->link( 'List Category', '/'.Configure::read('Routing.adminfolder').'/categorys/index', array( 'id' => 'cat' ) ); ?>
</div>
<div id="clearer"></div>
<fieldset>
        <legend><?php echo __('Edit Category'); ?></legend>
<?php 
    echo $this->Form->create('Category');
    echo $this->Form->input('name_category');
    echo $this->Form->end(__('Submit'));
?>
 </fieldset>	