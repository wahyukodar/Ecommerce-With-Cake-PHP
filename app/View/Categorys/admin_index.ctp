<div id="list_all">
	<?php echo $this->Html->link( '+ Add Category', array( 'action' => 'add' ) ); ?>
</div>

<div id="clearer"></div>

<legend><?php echo __('Categories'); ?></legend>
<div class="table-responsive">
<table id="paging_table" class="table table-striped table-bordered">
	<!-- table heading -->
	<tr style='background-color:#fff;'>
		<th>Category Name</th>
        <th>Action</th>
	</tr>
	
<?php
	foreach( $category as $cat ){
        echo "<tr>";
        echo "<td>{$cat['Category']['name_category']}</td>";
        echo "<td class='actions'>";
        echo $this->Html->link( 'Edit', array('action' => 'edit', $cat['Category']['id']) );
        echo $this->Form->postLink  ( 'Delete', array   (
                                                        'action' => 'delete', 
                                                        $cat['Category']['id']
                                                        ), 
                                                array   (
                                                        'confirm'=>'Are you sure you want to delete that category?',
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