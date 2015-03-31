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
 <!-- Google Web Fonts -->
	<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<?php
        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('style.front');
        echo $this->Html->css('responsive');
       
        
        
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
        $baseURL = $this->webroot;
	?>
<style>
#popupmessage{
    display:none;
    background:#cfcfcf;
    color:#212121;
    position:fixed;
    top:50%;
    z-index:9999999;
    position: fixed;
    font-size:30px;
    padding:20px;
    height:70px;
    margin:-25px auto 0 auto;
    border:5px solid #CCC;
    left: 0;
    right: 0;
}
</style>
<?php
echo $this->Html->script('jquery-1.11.1.min.js');
?>
<script> 
function AlertMessage(message){  
var fullbaseurl = '<?php echo Router::fullbaseUrl().$this->webroot ?>';
    $('#popupmessage').css("display","block");
    $('#popupmessage').html(message);
    setTimeout(function(){
    $('#popupmessage').css("display","none");
    var url = fullbaseurl+'/index.html';
                            $(location).attr('href',url);
    },1500);
}
</script>
</head>
<body>
<div id="popupmessage"></div>

<header id="header-area">
	<!-- Header Top Starts -->
		<div class="header-top">
			<div class="container">					
				<!-- Currency & Languages Starts -->
					<div class="col-sm-4 col-xs-12">
						<div class="pull-left">
						
						</div>
					</div>
				<!-- Currency & Languages Ends -->
				<!-- Header Links Starts -->
					<div class="col-sm-8 col-xs-12">
						<div class="header-links">
							<ul class="nav navbar-nav pull-right">
								<li>
									<a href="<?php echo $baseURL ?>index.html">
										<i class="fa fa-home" title="" data-original-title="Home"></i>
										<span class="hidden-sm hidden-xs">
											Home
										</span>
									</a>
								</li>
								<!-- <li>
									<a href="#">	
										<i class="fa fa-heart" title="" data-original-title="Wish List"></i>
										<span class="hidden-sm hidden-xs">
											Wish List(0)
										</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-user" title="" data-original-title="My Account"></i>
										<span class="hidden-sm hidden-xs">
											My Account
										</span>
									</a>
								</li> -->
								<li>
									<a href="<?php echo $baseURL ?>carts">
										<i class="fa fa-shopping-cart" title="" data-original-title="Shopping Cart"></i>
										<span class="hidden-sm hidden-xs">
											Shopping Cart
										</span>
									</a>
								</li>
								<li>
									<a href="<?php echo $baseURL ?>checkout">
										<i class="fa fa-crosshairs" title="" data-original-title="Checkout"></i>
										<span class="hidden-sm hidden-xs">
											Checkout
										</span>
									</a>
								</li>
                        <!--	<li>
									<a href="register.html">
										<i class="fa fa-unlock" title="" data-original-title="Register"></i>
										<span class="hidden-sm hidden-xs">
											Register
										</span>
									</a>
								</li> -->
								<li>
                                <?php
                                if(!$this->Session->check('Auth.User')){
                                ?>
									<a href="<?php echo $baseURL ?>login">
										<i class="fa fa-lock" title="" data-original-title="Login"></i>
										<span class="hidden-sm hidden-xs">
											Login
										</span>
									</a>
                                 <?php
                                 }
                                 else{
                                 ?>
                                    <a href="<?php echo $baseURL ?>logout">
										<i class="fa fa-unlock" title="" data-original-title="Logout"></i>
										<span class="hidden-sm hidden-xs">
											Logout
										</span>
									</a>
                                 <?php
                                 }
                                 ?>
								</li>
							</ul>
						</div>
					</div>
				<!-- Header Links Ends -->
			</div>
		</div>
	<!-- Header Top Ends -->
	<!-- Starts -->
		<div class="container">
		<!-- Main Header Starts -->
			<div class="main-header">
				<div class="row">					
				<!-- Search Starts -->
					<div class="col-md-3">
						<div id="search">
                        <?php echo $this->Form->create('Cari',array('url' => array('controller' => 'cari_produk','action'=>'index'))); ?>
							<div class="input-group">
                            
                            <?php echo $this->Form->input('Search',array('class'=>'form-control  input-lg','label'=>false,'placeholder'=>'Search')) ?>
							  <span class="input-group-btn">
                            <?php echo $this->Form->button('<i class="fa fa-search"></i>',array('class'=>'btn btn-lg')) ?>
                            <?php echo $this->Form->end(); ?> 
							  </span>
							</div>
						</div>	
					</div>
				<!-- Search Ends -->
				<!-- Logo Starts -->
					<div class="col-md-6">
						<div id="logo">
                        <a href="<?php echo $baseURL ?>index.html"><img src="<?php echo $baseURL ?>img/logo.png" title="Fashion Shoppe" alt="Fashion Shoppe" class="img-responsive"></a>
						</div>
					</div>
				<!-- Logo Starts -->
				<?php require_once "shopping_cart.ctp"; ?>
				</div>
			</div>
		<!-- Main Header Ends -->
		<!-- Main Menu Starts -->
			<nav id="main-menu" class="navbar" role="navigation">
			<!-- Nav Header Starts -->
				<div class="navbar-header">
					<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-cat-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<i class="fa fa-bars"></i>
					</button>
				</div>
			<!-- Nav Header Ends -->
			<!-- Navbar Cat collapse Starts -->
				<div class="collapse navbar-collapse navbar-cat-collapse">
					<ul class="nav navbar-nav">
                        <?php
                            foreach($datacategory as $cat){
                        ?>
                        <li>
                        <?php echo $this->Html->link( $cat['Category']['name_category'], array('controller'=>'category','action' => 'index', $cat['Category']['id']) ); ?>
                        </li>
                        <?php
                            }
                        ?>
					</ul>
				</div>
			<!-- Navbar Cat collapse Ends -->
			</nav>
		<!-- Main Menu Ends -->
		</div>
	<!-- Ends -->
	</header>
    

    
    <?php echo $this->fetch('content'); ?>
        
        
        
    <footer id="footer-area">
	<!-- Copyright Area Starts -->
		<div class="copyright">
		<!-- Container Starts -->
			<div class="container">
			<!-- Starts -->
				<p class="pull-left">
					&nbsp; 2015 Fashion Shoppe Stores. Bootstrap Designed By <a href="http://jualbelibuku.com">Jual Beli Buku</a>
				</p>
			<!-- Ends -->
			</div>
		<!-- Container Ends -->
		</div>
	<!-- Copyright Area Ends -->
	</footer>

            
<?php
echo $this->Html->script('jquery-1.11.1.min.js');
echo $this->Html->script('jquery-migrate-1.2.1.min.js');
echo $this->Html->script('bootstrap.min.js');
echo $this->Html->script('bootstrap-hover-dropdown.min.js');
echo $this->Html->script('jquery.magnific-popup.min.js');
echo $this->Html->script('custom.js');
?>
</body>
</html>