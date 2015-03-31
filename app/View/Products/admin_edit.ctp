<div id="list_all">
	<?php echo $this->Html->link( 'List Products', '/'.Configure::read('Routing.adminfolder').'/products/index', array( 'class' => 'button' ) ); ?>
</div>
<div id="clearer"></div>
<fieldset>
        <legend><?php echo __('Edit Product'); ?></legend>
<?php 
echo $this->Form->create('Product', array('type' => 'file'));
echo $this->Form->input('Product.id_cat', array('type' => 'select',  'label' => 'Category', 'options' => $clients));
echo $this->Form->input('Product.product_name', array('label' => 'Product Name'));
echo $this->Form->input('Product.cost', array('label' => 'Price','type'=>'number'));
echo $this->Form->input('Product.filename', array('label' => 'Image','type'=>'file'));
echo $this->Form->end('Submit');
?>
</fieldset>	