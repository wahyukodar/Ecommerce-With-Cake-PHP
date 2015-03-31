<div id="list_all">
	<?php echo $this->Html->link( '+ New Product', array( 'action' => 'add' ) ); ?>
</div>

<div id="clearer"></div>

<legend><?php echo __('Products'); ?></legend>

<div class="table-responsive">
<table id="paging_table" class="table table-striped table-bordered">
	<!-- table heading -->
	<tr>
		<th>Category</th>
		<th>Product Name</th>
		<th>Price</th>
		<th>Actions</th>
	</tr>
	
<?php
	foreach($dataproducts as $product){
        echo "<tr>";
        echo "<td>{$product['Category']['name_category']}</td>";
        echo "<td>{$product['Product']['product_name']}</td>";
        echo "<td>\${$product['Product']['cost']}</td>";
        echo "<td class='actions'>";
        echo $this->Html->link( 'Edit', array('action' => 'edit', $product['Product']['id']) );
        echo $this->Form->postLink( 'Delete',   array   (
                                                        'action' => 'delete', 
                                                        $product['Product']['id']
                                                        ), 
                                                array   (
                                                        'confirm'=>'Are you sure you want to delete that product?',
                                                        'class' => 'delete'                            
                                                        ) 
                                                    
                                    );
        echo "</td>";
        echo "</tr>";
	}
?>
	
</table>
</div>
<?php echo $this->Paginator->numbers(); /*$this->Paginator->numbers(array('class' => 'disabled btn-primary'));*/ ?>    
<?php echo $this->Paginator->prev(' « Previous ', null, null, array('class' => 'disabled btn-primary')); ?>
<?php echo $this->Paginator->next(' Next » ', null, null, array('class' => 'disabled btn-primary')); ?>    
<?php //echo $this->Paginator->counter(); ?>