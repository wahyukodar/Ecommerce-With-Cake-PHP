<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		
		//user defined
		echo $this->Html->css('style');
		echo $this->Html->css('bootstrap');
        echo $this->Html->css('bootstrap-datatable');
        echo $this->Html->script('jquery-1.11.1.min.js');
        echo $this->Html->script('jquery.dataTables.min.js');
        echo $this->Html->script('dataTables.bootstrap.js');
        //echo $this->Html->script('bootstrap.js');
        
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <script>
    $(document).ready(function() {
    $('#paging_table').dataTable();
    });
    </script>
</head>
<body>

	<div id="container">
   
		<div id="navbar">
         <nav class="navbar navbar-default">
  <div class="container-fluid">
 <?php
 if($this->Session->check('Auth.User')){ 
 ?>
    <div>
      <ul class="nav navbar-nav">
        <li><?php echo $this->Html->link( 'Users', '/admin/users'); ?></li>
        <li><?php echo $this->Html->link( 'Category', '/admin/categorys'); ?></li>
        <li><?php echo $this->Html->link( 'Product', '/admin/products'); ?></li>
        <li><?php echo $this->Html->link( 'Purchase Order', '/admin/purchases'); ?></li>
      </ul>
    </div>

    <div class="nav navbar-nav" style="float:right;">
      <li><?php echo $this->Html->link( 'Logout', '/admin/logout'); ?></li>
    </div>
  <?php
 }
 else
 {
 ?>  
<div class="nav navbar-nav" style="float:right;">
      <li><?php echo $this->Html->link( 'Register', '/admin/users/add'); ?></li>
    </div>
<?php
}
?>    
  </div>
</nav>
        </div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		
	</div>

</body>
</html>
