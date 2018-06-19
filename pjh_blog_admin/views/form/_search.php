<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormFieldSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-field-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'field') ?>

    <?= $form->field($model, 'field_desc') ?>

    <?= $form->field($model, 'field_type') ?>

    <?= $form->field($model, 'field_default') ?>

    <?php // echo $form->field($model, 'is_must') ?>

    <?php // echo $form->field($model, 'is_show') ?>

    <?php // echo $form->field($model, 'rule_type') ?>

    <?php // echo $form->field($model, 'rule_desc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
