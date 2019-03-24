<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\User;
use backend\models\Cart;
use backend\models\Products;
use backend\models\Orders;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $this->title ?>
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-shopping-cart"></i> Orders</a></li>
            <li class="active"><?php echo $this->title ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="">
            <form method="post" action="/backend/web/orders/index" >
                <div class="row  ">
                    <br />
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder="Search product ..." name="Search[name]">
                        </div>

                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder="Search email ..." name="Search[email]">
                        </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="Search[from]">
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="Search[to]">
                            </div>
                        <div class="col-md-12"><br /><input type="submit" value="Search" class="btn btn-primary pull-right"></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-8 col-xs-12">
                <table class="table table-hover table-responsive">
                    <thead>
                    <th>Cart Alias</th>
                    <th>Total Amount</th>
                    <th>Items</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date</th>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $orderData => $order) { ?>
                            <tr>
                                <td><?php echo $order->cart_alias ?></td>
                                <td><?php echo number_format($order->total_amount) . " JOD" ?></td>
                                <td></td>
                                <td><?php echo $order->username ?></td>
                                <td><?php echo $order->user_email ?></td>
                                <td><?php echo $order->user_phone ?></td>
                                <td><?php echo $order->user_address ?></td>
                                <td><?php echo date('Y-m-d H:i:s A', $order->date_created) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->