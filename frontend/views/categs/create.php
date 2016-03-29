<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Categs */

$this->title = 'Create Categs';
$this->params['breadcrumbs'][] = ['label' => 'Categs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
