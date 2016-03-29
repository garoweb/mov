<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Categs;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'item_parent_id')->dropDownList(   Categs::FullCategList(), ['prompt'=>'Select...']) ?>

    <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_order')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), ['options' => ['accept' => 'image/*'], ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
