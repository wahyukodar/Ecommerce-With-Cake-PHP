<div id="main-container" class="container">
    <div class="row">
    <!-- Primary Content Starts -->
        <div class="col-md-9">
        <!-- Breadcrumb Starts -->
            <ol class="breadcrumb">
                <li><a href="<?php echo $this->webroot?>index.html">Home</a></li>
                <li class="active"><?php echo $dataCategory[0]['Percategory']['name_category'] ?></li>
            </ol>
        <!-- Breadcrumb Ends -->
        <!-- Main Heading Starts -->
            <h2 class="main-heading2">
                Fashionable Clothing
            </h2>
        <!-- Main Heading Ends -->
        
       
        <!-- Product List Display Starts -->
            <div class="row">
            <?php foreach($dataCategory as $cats){
            ?>
            <!-- Product #1 Starts -->
                <div class="col-xs-12">
                    <div class="product-col list clearfix">
                        <div class="image">
                            <img src="<?php echo $this->webroot.$cats['Product']['filename'] ?>" width="200" alt="product" class="img-responsive">
                        </div>
                        <div class="caption">
                            <h4><a href="product-full.html"><?php echo $cats['Product']['product_name'] ?></a></h4>
                            <div class="description">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </div>
                            <div class="price">
                                <p class="price-tax"></p>
                                <span class="price-new">$<?php echo $cats['Product']['cost'] ?></span> 
                            </div>
                            <div class="cart-button button-group">
                                <?php echo $this->Form->create('Cart',array('controller'=>'carts','action' => 'index/'.$cats['Product']['id'].'','')); ?>
                                <?php echo $this->Form->button('Add to cart <i class="fa fa-shopping-cart"></i>', array('type' => 'submit','class'=>'btn btn-cart')); ?>	
                                <?php echo $this->Form->end(); ?>  								
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Product #1 Ends -->
            <?php } ?>
            </div>
        <!-- Product List Display Ends -->
        <!-- Pagination & Results Starts -->
            <div class="row">
            <!-- Pagination Starts -->
                <div class="col-sm-6 pagination-block">
                <ul class="pagination">
                 <?php echo $this->Paginator->prev('&laquo;', 
                 array('tag' => 'li',  'title' => __('Previous page'), 
                 'disabledTag' => 'span', 'escape' => false), 
                 null, 
                 array('tag' => 'li', 'disabledTag' => 'span', 'escape' => false, 'class' => 'disabled')); 
                 ?> 
                         
                <?php echo $this->Paginator->numbers(array(
                'separator' => '',
                'tag' => 'li',
                'currentClass' => 'active',
                'currentTag'    => 'a'
                ));
                ?>  
                      
                <?php echo $this->Paginator->next('&raquo;', 
                array('tag' => 'li', 
                'disabledTag' => 'span', 
                'title' => __('Next page'), 
                'escape' => false), 
                
                null, 
                
                array('tag' => 'li', 
                'disabledTag' => 'span', 
                'escape' => false, 
                'class' => 'disabled'));
                ?>   
                </ul>
                </div>
            <!-- Pagination Ends -->
            <!-- Results Starts -->
                <div class="col-sm-6 results">
             <!--       Showing 1 to 3 of 12 (4 Pages)  -->
                </div>
            <!-- Results Ends -->
            </div>
        <!-- Pagination & Results Ends -->
        </div>
    <!-- Primary Content Ends -->
    <!-- Sidebar Starts -->
        <div class="col-md-3">
        <!-- Categories Links Starts -->
            <h3 class="side-heading">Categories</h3>
            <div class="list-group">
                <?php
                    foreach($datacategory as $cat){
                    echo $this->Html->link('<i class="fa fa-chevron-right"></i>'.$cat['Category']['name_category'], 
                    array('controller'=>'category','action' => 'index', $cat['Category']['id']),array('class'=>'list-group-item','escape'=>false)); 
                    }
                ?>
               
            </div>
        <!-- Categories Links Ends -->
        
        </div>
    <!-- Sidebar Ends -->
    </div>
</div>