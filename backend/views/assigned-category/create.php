<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AssignedCategory */

$this->title = 'Create Assigned Category';
$this->params['breadcrumbs'][] = ['label' => 'Assigned Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assigned-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
