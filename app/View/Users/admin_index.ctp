<div id="list_all">
	<?php echo $this->Html->link( '+ New User', array( 'action' => 'add' ) ); ?>
</div>

<div id="clearer"></div>

<legend><?php echo __('Users'); ?></legend>

<div class="table-responsive">
<table id="paging_table" class="table table-striped table-bordered">
	<!-- table heading -->
	<tr>
		<th>ID</th>
		<th>Firstname</th>
		<th>Lastname</th>
		<th>Username</th>
		<th>Email</th>
        <th>Role</th>
		<th>Actions</th>
	</tr>
	
<?php
	foreach( $users as $user ){
		echo "<tr>";
			echo "<td>{$user['User']['id']}</td>";
			echo "<td>{$user['User']['firstname']}</td>";
			echo "<td>{$user['User']['lastname']}</td>";
			echo "<td>{$user['User']['username']}</td>";
			echo "<td>{$user['User']['email']}</td>";
            echo "<td>{$user['User']['role']}</td>";
			echo "<td class='actions'>";
            echo $this->Html->link( 'Edit', array('action' => 'edit', $user['User']['id']) );
            echo $this->Form->postLink  ( 'Delete',     array   (
                                                                'action' => 'delete', 
                                                                $user['User']['id']
                                                                ), 
                                                        array   (
                                                                'confirm'=>'Are you sure you want to delete that user?',
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