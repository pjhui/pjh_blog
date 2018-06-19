<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin()?>
    <?php foreach ($field_list as $val): ?>
        <?php 
            $type = $model->form_type[$val['field_type']];
        ?>
        <?= $form->field($model, $val['field'])->$type($model->get_options($val))?>
    <?php endforeach; ?>
    <?= Html::submitButton('注册', ['class' => 'btn btn-success'])?>
<?php $form->end()?>