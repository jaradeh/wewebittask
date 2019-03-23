<?php
$subTotal = 1;
$total = 2;
?>
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Shopping Cart</h3>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li>&gt;</li>
                        <li>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<div class="shopping_cart_area">
    <div class="container">  
        <form action="#"> 
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart as $items => $item) { ?>
                                        <tr>
                                            <td class="product_remove">
                                                <a href="/remove-cart?id=<?php echo $item->id ?>" title="Delete" aria-label="Delete" data-pjax="0" data-confirm="Are you sure you want to delete this item?" >
                                                    <i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td class="product_thumb"><a href="#"><img src="<?php echo "/frontend/web/images/products/270x270/" . $item['products'][0]['image'] ?>" alt=""></a></td>
                                            <td class="product_name"><a href="#"><?php echo $item['products'][0]['name'] ?></a></td>
                                            <td class="product-price"><?php echo $item['products'][0]['price'] ?> JOD</td>
                                            <td class="product_quantity"><label>Quantity</label> <input min="0" max="100" value="<?php echo $item->quantity ?>" type="number"></td>
                                            <td class="product_total"><?php echo $item['products'][0]['price'] * $item->quantity ?> JOD</td>
                                        </tr>
                                        <?php $total = $total + $item['products'][0]['price'] ?>
                                    <?php } ?>
                                </tbody>
                            </table>   
                        </div>  
                        <div class="cart_submit">
                            <button type="submit">update cart</button>
                        </div>      
                    </div>
                </div>
            </div>
            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">   
                                <p>Enter your coupon code if you have one.</p>                                
                                <input placeholder="Coupon code" type="text">
                                <button type="submit">Apply coupon</button>
                            </div>    
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount"><?php echo $total ?> JOD</p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Tax</p>
                                    <p class="cart_amount"><span>Flat Rate (16%):</span> <?php echo $subTotal = $total * 16 / 100 ?> JOD</p>
                                </div>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount"><?php echo $subTotal + $total ?> JOD</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="#">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
        </form> 
    </div>     
</div>