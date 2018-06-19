<?php
namespace pjh_blog_admin\controllers;
use Yii;
use yii\web\Controller;
class TestController extends Controller {
	public function actionHome(){
		$aa=Yii::$app->db->beginTransaction();
		print_r($aa);die;
	}
}
?>