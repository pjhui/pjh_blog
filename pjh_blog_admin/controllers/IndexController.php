<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\controllers\CommonController;
class IndexController extends CommonController {
	public function actionIndex(){
		return $this->render('index');
	}
	public function actionHome(){
		echo "home";
	}
}
?>