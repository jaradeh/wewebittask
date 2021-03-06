<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */

$this->title = 'Update Orders: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
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
        <br />
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12 col-sm-8 col-xs-12">
                <center>
                    <div class="alert alert-danger"> You are not allowed to create orders !</div>
                </center>

            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

