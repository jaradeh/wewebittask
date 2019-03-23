<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\AssignedCategory;
use backend\models\Category;



/* @var $this yii\web\View */
/* @var $model backend\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
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
            <li><a href="/"><i class="fa fa-list"></i> Products</a></li>
            <li class="active"><?php echo $this->title ?></li>
        </ol>
        <br />
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12 col-sm-8 col-xs-12">
                <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'name',
                        [
                            'attribute' => 'image',
                            'format' => 'html',
                            'value' => function ($model) {
                                if ($model->image != NULL) {
                                    return "<img src='/frontend/web/images/products/270x270/" . $model->image . "' style='width:200px;'>";
                                } else {
                                    return "<center><img src='/frontend/web/images/products/default/default.png' style='width:100px;'></center>";
                                }
                            },
                        ],
                        'store_quantity',
                        'sku',
                        'price',
                        [
                            'attribute' => 'Categories',
                            'format' => 'html',
                            'value' => function ($model) {
                                $getAllCategories = AssignedCategory::find()->where(['product_id' => $model->id])->all();
                                $categoryNames = "";
                                foreach($getAllCategories as $categories => $category){
                                    $categoryDetails = Category::find()->where(['id'=>$category['category_id']])->one();
                                    $categoryNames = $categoryNames ." - " . $categoryDetails['name'];
                                }
                                return $categoryNames;
                            },
                        ],
                    ],
                ])
                ?>
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->