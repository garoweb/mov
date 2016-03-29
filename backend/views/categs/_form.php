<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Categs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categs-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'categ_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categ_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categ_order')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'file')->widget(FileInput::classname(), [ 'options' => ['accept' => 'image/*'], ]);  ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
