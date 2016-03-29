<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Categs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'categ_name',
            'categ_img',
            'categ_status',
            'categ_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
