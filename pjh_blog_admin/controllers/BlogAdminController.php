<?php
namespace pjh_blog_admin\controllers;
use Yii;
use pjh_blog_admin\common\controllers\CommonController;
class BlogAdminController extends CommonController {
	//默认访问的方法名
	public $defaultAction = 'index';
    public function actionIndex() {
    	return $this->render('index',['title'=>'后台管理']);
    }
    public function actionWelcome(){
    	return $this->render('welcome',['title'=>'首页']);
    }
}
