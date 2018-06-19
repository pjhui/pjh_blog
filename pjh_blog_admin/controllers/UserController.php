<?php
namespace pjh_blog_admin\controllers;
use Yii;
use yii\web\Controller;
use pjh_blog_admin\common\models\Admin;
/*
用户
*/
class UserController extends Controller {
	public $enableCsrfValidation = false;
	public function init(){
		$session=Yii::$app->session;;
		$uid=$session->get('uid');
		if($uid){
			return $this->redirect(['/blog-admin/index']);
		}
	}
	public function actionUserLogin(){
		
		return $this->render('login');
	}
	public function actionLoginCheck(){
		$name=Yii::$app->request->post('username');
		$pwd=Yii::$app->request->post('pwd');
		$res=Admin::findByInfo($name,$pwd);
	}
	
}
?>