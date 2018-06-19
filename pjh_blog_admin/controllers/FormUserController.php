<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\UserForm;

/**
 * Site controller
 */
class FormUserController extends Controller {

    public function actionIndex() {
        $model = new UserForm();
        $field_list = $model->get_field_list();//获取字段 并生成规则 起别名等等
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $res = $model->register();
            var_dump($res);die;
        }
        return $this->render('index', [
            'model' => $model,
            'field_list' => $field_list
        ]);
    }

}
