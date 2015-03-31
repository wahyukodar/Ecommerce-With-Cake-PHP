<!-- Shopping Cart Starts -->
    <div class="col-md-3">
        <div id="cart" class="btn-group btn-block">
            <button type="button" data-toggle="dropdown" class="btn btn-block btn-lg dropdown-toggle" aria-expanded="false">
                <i class="fa fa-shopping-cart"></i>
                <span class="hidden-md">Cart:</span> 
                <span id="cart-total"><?php echo sizeof($datacarthome) ?> item(s) - $<?php echo $datasumhome[0][0]['subtotalhome'] ?></span>
                <i class="fa fa-caret-down"></i>
            </button>
            <ul class="dropdown-menu pull-right">
                <li>
                    <table class="table hcart">
                        <tbody>
                        
                        <?php foreach($datacarthome as $carthome){
                        ?>
                        <tr id="carthome<?php echo $carthome['Cart']['id'] ?>">
                            <td class="text-center">
                                <a href="product.html">
                                    <img src="<?php echo $this->webroot.$carthome['Product']['filename'] ?>" alt="image" title="image" width="40" class="img-thumbnail img-responsive">
                                </a>
                            </td>
                            <td class="text-left">
                                <a href="product-full.html">
                                    <?php echo $carthome['Product']['product_name'] ?>
                                </a>
                            </td>
                            <span class="homeqtycost<?php echo $carthome['Cart']['id'] ?>">
                            <td class="text-right">x <span class="qtyhomenya<?php echo $carthome['Cart']['id'] ?>"><?php echo $carthome['Cart']['qty'] ?></span></td>
                            <td class="text-right">$ <span class="costhomenya<?php echo $carthome['Cart']['id'] ?>">
                            <?php $totalperitem = $carthome['Product']['cost']*$carthome['Cart']['qty']; echo $totalperitem ?>
                            </span></td>
                            </span>
                            <td class="text-center">
                                <a href="#" onClick="deleteCartHome(<?php echo $carthome['Cart']['id'] ?>)">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        
                        
                        <?php
                        }
                        ?>
                    </tbody></table>
                </li>
                <li>
                    <table class="table table-bordered total">
                        <tbody>
                            <tr>
                                <td class="text-right"><strong>Sub-Total</strong></td>
                                <td class="text-left">$<span class="subtotalhomebawah"><?php echo $datasumhome[0][0]['subtotalhome'] ?></span></td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Shipping</strong></td>
                                <td class="text-left">$<?php if($datasumhome[0][0]['subtotalhome']!=0){echo "15";}?></td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Total</strong></td>
                                <td class="text-left">$
                                <span class="totalsemuahome">
                                <?php 
                                if($datasumhome[0][0]['subtotalhome']!=0){echo $datasumhome[0][0]['subtotalhome']+15; }
                                ?>
                                </span></td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-right btn-block1">
                        <a href="<?php echo $this->webroot ?>carts">
                            View Cart
                        </a>
                        <a href="<?php echo $this->webroot ?>checkout">
                            Checkout
                        </a>
                    </p>
                </li>									
            </ul>
        </div>
    </div>
<!-- Shopping Cart Ends -->
<script>
function deleteCartHome($id_order){
var fullbaseurl = '<?php echo Router::fullbaseUrl();?>';
   $.ajax({
        type: "POST",
        url: fullbaseurl+'/carts/delete',
        data: "id="+$id_order,
        dataType: "json",
        success: function (data){
            $('#popupmessage').css("display","block");
            $('#popupmessage').html(data.message);
            setTimeout(function(){
            $('#popupmessage').css("display","none");
            },1000);
            
            if(data.update=="ok"){
                $("#carthome"+$id_order).remove();        
                    if(data.subtotalhomes==null){
                        $('#cart-total').html(data.jmlitem+" item($) - $");
                        var url = fullbaseurl+'/index.html';
                        $(location).attr('href',url);
                    }
                    else{
                        $('#cart-total').html(data.jmlitem+" item($) - $"+data.subtotalhomes);
                    }
                    var carts = '<?php echo $this->params['controller']; ?>';
                    if(carts=="carts"){
                        $("#kolomnya"+$id_order).remove();
                        $('.totalkeseluruhan').html(data.subtotalhomes);
                        $('.subtotalbawah').html(data.subtotalhomes);
                        $('.totalsemuanya').html(parseInt(data.subtotalhomes+15));
                    }
                    $('.subtotalhomebawah').html(data.subtotalhomes);
                    var totalsemuahomes = parseInt(data.subtotalhomes)+15;
                    $('.totalsemuahome').html(totalsemuahomes);
                    
            }
        }
    }); 
}
</script>