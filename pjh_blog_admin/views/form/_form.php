<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormField */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-field-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'field')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field_type')->dropDownList($model->field_type_list) ?>
    
    <?= $form->field($model, 'field_value') ?>

    <?= $form->field($model, 'field_default')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_must')->radioList($model->is_must_list) ?>

    <?= $form->field($model, 'is_show')->radioList($model->is_show_list) ?>

    <?= $form->field($model, 'rule_type')->dropDownList($model->rule_type_list) ?>

    <?= $form->field($model, 'rule_desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
