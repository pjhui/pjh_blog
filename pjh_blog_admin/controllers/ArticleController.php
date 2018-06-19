<?php
namespace pjh_blog_admin\controllers;
use Yii;
use pjh_blog_admin\common\controllers\CommonController;
use pjh_blog_admin\common\models\Article;
use pjh_blog_admin\common\models\ArticleContent;
use pjh_blog_admin\common\models\ArticleType;
use yii\helpers\ArrayHelper;
use pjh_blog_admin\common\components\ArticleComponet;
class ArticleController extends CommonController {
    //文章的列表
    public function actionArticleList() {
    	$data=ArticleComponet::getFindByAll();
        $count=count($data['list']);
		return $this->render('article_list',['title'=>'文章类表','data'=>$data]);
    }
    //文章的详情
    public function actionArticleDetails(){
        $ar_id=Yii::$app->request->get('article_id');
        //查询文章
        $article=ArticleComponet::getArticleDetails($ar_id);
        return $this->render('article_details',['title'=>'文章的详情','data'=>$article]);
    }
    //文章添加页面
    public function actionArticleAdd(){
        $data=ArticleType::getFindByAll();
        return $this->render('article_add',['data'=>$data]);
    }
	//文章抓取
	public function actionArticleGets(){
		$web_name=['CSDN','博客园','简书'];
		$data=ArticleType::getFindByAll();
		return $this->render('article_gets',['data'=>$data,'web_name'=>$web_name]);
	}
}
