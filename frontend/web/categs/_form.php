<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Categs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categ_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categ_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categ_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categ_order')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
