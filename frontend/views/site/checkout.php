<?php
$subTotal = 0;
$total = 0;
$cartAlias = "";
?>
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Checkout</h3>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li>&gt;</li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>



<div class="Checkout_section">
    <div class="container">
        <form action="/submit-checkout" method="post">
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h3>Billing Details</h3>
                        <div class="row">

                            <div class="col-lg-12 mb-20">
                                <label>Full Name Name <span>*</span></label>
                                <input type="text" name="Orders[name]" required>    
                            </div>
                            <div class="col-lg-12 mb-20">
                                <label>Phone<span>*</span></label>
                                <input type="text" name="Orders[phone]" required> 

                            </div> 
                            <div class="col-lg-12 mb-20">
                                <label> Email Address   <span>*</span></label>
                                <input type="text" name="Orders[email]" required> 
                            </div>
                            <div class="col-lg-12 mb-20">
                                <label> Address   <span>*</span></label>
                                <input type="text" name="Orders[address]" required> 
                            </div>                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h3>Your order</h3> 
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart as $items => $item) { ?>
                                        <tr>
                                            <td> <?php echo $item['products'][0]['name'] ?> <strong> × <?php echo $item->quantity ?></strong></td>
                                            <td> <?php echo number_format($item['products'][0]['price'] * $item->quantity) ?> JOD</td>
                                        </tr>
                                        <?php $total = $total + $item['products'][0]['price'] ?>
                                        <?php $cartAlias = $item['cart_alias']; ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Cart Subtotal</th>
                                        <td><?php echo number_format($total) ?> JOD</td>
                                    </tr>
                                    <tr>
                                        <th>Tax Flat Rate (16%)</th>
                                        <td><strong><?php echo $subTotal = number_format($total * 16 / 100) ?> JOD</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Order Total</th>
                                        <td><strong><?php $total_amount = $subTotal + $total; echo number_format($total_amount) ?> JOD</strong></td>
                                    </tr>
                                </tfoot>
                            </table>     
                        </div>
                        <div class="payment_method">
                            <div class="cart_submit">
                                <input type="hidden" name="Orders[cart_alias]" value="<?php echo $cartAlias ?>"> 
                                <input type="hidden" name="Orders[total_amount]" value="<?php echo $total_amount ?>"> 
                                <button type="submit">Submit Checkout</button>
                            </div>     
                        </div>         
                    </div>
                </div> 
            </div> 
        </form>
    </div>       
</div>