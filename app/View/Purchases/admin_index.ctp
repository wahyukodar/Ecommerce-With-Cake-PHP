<div id="list_all">
	<?php //echo $this->Html->link( '+ New Purchase', array( 'action' => 'add' ) ); ?>
</div>

<div id="clearer"></div>

<legend><?php echo __('Purchases'); ?></legend>

<div class="table-responsive">
<table id="paging_table" class="table table-striped table-bordered">
	<!-- table heading -->
	<tr>
		<th>Buyer</th>
		<th>Product Name</th>
		<th>Category Name</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Total Price</th>
		<th>Actions</th>
	</tr>
	
<?php
	foreach($datapurchases as $purchase){
        echo "<tr>";
        echo "<td>{$purchase['User']['firstname']} {$purchase['User']['lastname']}</td>";
        echo "<td>{$purchase['Product']['product_name']}</td>";
        echo "<td>{$purchase['Category']['name_category']}</td>";
        echo "<td>{$purchase['Purchase']['qty']}</td>";
        echo "<td>\${$purchase['Product']['cost']}</td>";
        $total = $purchase['Purchase']['qty'] * $purchase['Product']['cost'];
        echo "<td>\$$total</td>";
        echo "<td class='actions'>";
        //echo $this->Html->link( 'Edit', array('action' => 'edit', $purchase['Purchase']['id']) );
        echo $this->Form->postLink( 'Delete',   array   (
                                                        'action' => 'delete', 
                                                        $purchase['Purchase']['id']
                                                        ), 
                                                array   (
                                                        'confirm'=>'Are you sure you want to delete that purchase?',
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