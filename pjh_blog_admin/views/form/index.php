<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormFieldSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Form Fields';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-field-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Form Field', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'field',
            'field_desc',
            'field_type',
            'field_value',
            'field_default',
            // 'is_must',
            // 'is_show',
            // 'rule_type',
            // 'rule_desc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
