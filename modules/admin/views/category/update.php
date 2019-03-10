<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = 'Update Category: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-update">

    <h1>Редактировать категорию <span style="color: red; font-weight: bold;"><?= $model->name ?></h1></span>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
