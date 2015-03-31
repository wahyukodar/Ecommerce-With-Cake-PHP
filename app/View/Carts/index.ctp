<div id="main-container" class="container">
	<!-- Breadcrumb Starts -->
		<ol class="breadcrumb">
			<li><a href="<?php echo $this->webroot?>index.html">Home</a></li>
			<li class="active">Shopping Cart</li>
		</ol>
	<!-- Breadcrumb Ends -->
	<!-- Main Heading Starts -->
		<h2 class="main-heading text-center">
			Shopping Cart
		</h2>
	<!-- Main Heading Ends -->

    <!-- Shopping Cart Table Starts -->
		<div class="table-responsive shopping-cart-table">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td class="text-center">
							Image
						</td>
						<td class="text-center">
							Product Details
						</td>							
						<td class="text-center">
							Quantity
						</td>
						<td class="text-center">
							Price
						</td>
						<td class="text-center">
							Total
						</td>
						<td class="text-center">
							Action
						</td>
					</tr>
				</thead>
				<tbody>
                
                <?php $totalkeseluruhan="";
                foreach($datacart as $cart){
                ?>
					<tr id="kolomnya<?php echo $cart['Cart']['id']; ?>">
						<td class="text-center">
							<a href="product.html">
								<img src="<?php echo $this->webroot.$cart['Product']['filename'] ?>" width="200" alt="<?php echo $cart['Product']['product_name'] ?>" title="<?php echo $cart['Product']['product_name'] ?>" class="img-thumbnail">
							</a>
						</td>
						<td class="text-center">
							<a href="#"><?php echo $cart['Product']['product_name'] ?></a>
						</td>							
						<td class="text-center">
							<div class="input-group btn-block">
								<input type="text" class="quantitynya<?php echo $cart['Cart']['id']; ?>" name="quantity" value="<?php echo $cart['Cart']['qty']; ?>" size="1" class="form-control">
							</div>								
						</td>
						<td class="text-center">
							$<span class="pricenya<?php echo $cart['Cart']['id']; ?>"><?php echo $cart['Product']['cost'] ?></span>
						</td>
						<td class="text-center">
							$<span class="subtotal totalnya<?php echo $cart['Cart']['id']; ?>"><?php $totalbiaya=$cart['Product']['cost']*$cart['Cart']['qty']; echo $totalbiaya; $totalkeseluruhan=$totalkeseluruhan+$totalbiaya; ?></span>
						</td>
						<td class="text-center">
							<button type="submit" title="" class="btn btn-default tool-tip" data-original-title="Update" onClick="updateCart(<?php echo $cart['Cart']['id']; ?>)">
								<i class="fa fa-refresh"></i>
							</button>
							<button type="button" title="" class="btn btn-default tool-tip" data-original-title="Remove" onClick="deleteCart(<?php echo $cart['Cart']['id']; ?>)">
								<i class="fa fa-times-circle"></i>
							</button>
						</td>
					</tr>
                <?php
                }
                ?>            	
				</tbody>
				<tfoot>
					<tr>
					  <td colspan="4" class="text-right">
						<strong>Total :</strong>
					  </td>
					  <td colspan="2" class="text-left">
						$<span class="totalkeseluruhan"><?php echo $totalkeseluruhan ?></span>
					  </td>
					</tr>
				</tfoot>
			</table>				
		</div>
	<!-- Shopping Cart Table Ends -->
	<!-- Shipping Section Starts -->
		<section class="registration-area">
			<div class="row">
			<!-- Shipping & Shipment Block Starts -->
            
            
				<div class="col-sm-6">
				<!-- Conditions Panel Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">
								Terms &amp; Conditions
							</h3>
						</div>
						<div class="panel-body">
							<p>
								HTML Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. 
							</p>
							<p>
								Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. 
							</p>
							<p>
								Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat.
							</p>								
						</div>
					</div>
				<!-- Conditions Panel Ends -->
				</div>
                
                <div class="col-sm-6">
				<!-- Conditions Panel Starts -->
                <!-- Total Panel Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">
								Total
							</h3>
						</div>
						<div class="panel-body">
							<dl class="dl-horizontal">
								<dt>Subtotal :</dt>
								<dd>$<span class="subtotalbawah"><?php echo $totalkeseluruhan ?></span></dd>
								<dt>Shipment Fee :</dt>
								<dd>$<span class="shippnya">15</span></dd>
							</dl>
							<hr>
							<dl class="dl-horizontal total">
								<dt>Total :</dt>
								<dd>$<span class="totalsemuanya"><?php echo $totalkeseluruhan+15; ?></span></dd>
							</dl>
							<hr>
							<div class="text-uppercase clearfix">
								<a href="<?php echo $this->webroot ?>index.html" class="btn btn-default pull-left">
									<span class="hidden-xs">Continue Shopping</span>
									<span class="visible-xs">Continue</span>
								</a>
								<a href="<?php echo $this->webroot ?>checkout" class="btn btn-default pull-right">		
									Checkout
								</a>
							</div>
						</div>
					</div>
				<!-- Total Panel Ends -->
                <!-- Conditions Panel Ends -->
				</div>
			<!-- Discount & Conditions Blocks Ends -->
            
            
			</div>
		</section>
	<!-- Shipping Section Ends -->
	</div>
    
    
    <script>
    function updateCart($id_order){
    var fullbaseurl = '<?php echo Router::fullbaseUrl();?>';
    var banyaknya = $('.quantitynya'+$id_order).val();
    var pricenya = parseInt($('.pricenya'+$id_order).text());
    var totalnya = parseInt(banyaknya*pricenya);
       $.ajax({
            type: "POST",
            url: fullbaseurl+'/carts/update',
            data: "id="+$id_order+"&qty="+banyaknya,
            dataType: "json",
            success: function (data){
                $('#popupmessage').css("display","block");
                $('#popupmessage').html(data.message);
                setTimeout(function(){
                $('#popupmessage').css("display","none");
                },1000);
                
                if(data.update=="ok"){
                    $('.totalnya'+$id_order).html(totalnya);
                    
                        var subtotal = 0;
                            $('.subtotal').each(function() {
                            var price = $(this);
                            subtotal+=parseInt(price.html());
                            });
                        $('.totalkeseluruhan').html(subtotal);
                        $('.subtotalbawah').html(subtotal);
                        $('.totalsemuanya').html(parseInt(subtotal+15));
                        
                        // update pada toggle navigasi
                        $('#cart-total').html(data.jmlitem+" item($) - $"+data.subtotalhomes);
                        $('.subtotalhomebawah').html(data.subtotalhomes);
                        var totalsemuahomes = parseInt(data.subtotalhomes)+15;
                        $('.totalsemuahome').html(totalsemuahomes);
                        $('.qtyhomenya'+$id_order).html(banyaknya);
                        $('.costhomenya'+$id_order).html(totalnya);
                }
            }
        }); 
    }
    
    
    function deleteCart($id_order){
    var fullbaseurl = '<?php echo Router::fullbaseUrl();?>';
       $.ajax({
            type: "POST",
            url: fullbaseurl +'/carts/delete',
            data: "id="+$id_order,
            dataType: "json",
            success: function (data){
                $('#popupmessage').css("display","block");
                $('#popupmessage').html(data.message);
                setTimeout(function(){
                $('#popupmessage').css("display","none");
                },1000);
                
                if(data.update=="ok"){
                    $("#kolomnya"+$id_order).remove();
                        var subtotal = 0;
                            $('.subtotal').each(function() {
                            var price = $(this);
                            subtotal+=parseInt(price.html());
                            });
                        $('.totalkeseluruhan').html(subtotal);
                        $('.subtotalbawah').html(subtotal);
                        $('.totalsemuanya').html(parseInt(subtotal+15));
                        if(subtotal==0){
                            $('#cart-total').html(data.jmlitem+" item($) - $");
                            $('.subtotalhomebawah').html("");
                            $('.totalsemuahome').html("");
                            var url = fullbaseurl +'/index.html';
                            $(location).attr('href',url);
                        }
                        else{
                            $('#cart-total').html(data.jmlitem+" item($) - $"+data.subtotalhomes);
                            $('.subtotalhomebawah').html(data.subtotalhomes);
                            var totalsemuahomes = parseInt(data.subtotalhomes)+15;
                            $('.totalsemuahome').html(totalsemuahomes);
                            $("#carthome"+$id_order).remove();   
                        }
                }
            }
        }); 
    }
    
    </script>