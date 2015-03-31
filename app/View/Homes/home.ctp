    <div class="container">
		<!-- Heading Starts -->
			<h2 class="product-head">Latest Products</h2>
		<!-- Heading Ends -->
		<!-- Products Row Starts -->
			<div class="row">
            <?php
            $count_product_home = 1;
            foreach($dataproduct as $product){
            ?>
            <!-- Product #<?php echo $count_product_home ?> Starts -->
				<div class="col-md-3 col-sm-6">
					<div class="product-col">
						<div class="image">
							<img src="<?php echo $product['Product']['filename'] ?>" alt="<?php echo $product['Product']['product_name'] ?>" class="img-responsive">
						</div>
						<div class="caption">
							<h4><a href="product.html"><?php echo $product['Product']['product_name'] ?></a></h4>
							<div class="price">
								<span class="price-new">$<?php echo $product['Product']['cost'] ?></span> 
								
							</div>
							<div class="cart-button button-group">
								<?php echo $this->Form->create('Cart',array('action' => 'index/'.$product['Product']['id'].'','')); ?>
                                <?php echo $this->Form->button('Add to cart <i class="fa fa-shopping-cart"></i>', array('type' => 'submit','class'=>'btn btn-cart')); ?>	
                                <?php echo $this->Form->end(); ?>                           
							</div>
						</div>
					</div>
				</div>
			<!-- Product #<?php echo $count_product_home; $count_product_home++; ?> Ends -->
            <?php
            }
            ?>
			</div>
		<!-- Products Row Ends -->
    </div>