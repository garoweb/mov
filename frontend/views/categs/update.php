<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Categs */

$this->title = 'Update Categs: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
