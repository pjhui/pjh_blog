<?php
namespace pjh_blog_admin\common\components;
use Yii;
use pjh_blog_admin\common\models\Article;
use pjh_blog_admin\common\models\ArticleContent;
use pjh_blog_admin\common\models\ArticleType;
use yii\helpers\ArrayHelper;
class ArticleComponet extends \yii\db\ActiveRecord{
    //获取全部的文章
    public static function getFindByAll(){
        $list=Article::getFindByAll();
        $type=ArticleType::getFindByAll();
        $type_ids=ArrayHelper::getColumn($type,'type_id');
        $type_arr=array_combine($type_ids,$type);
        foreach($list as &$val){
            foreach($type_arr as $v){
                if($val['type_id'] == $v['type_id']){
                    $val['type_name']=$v['type_name'];
                }
            }
            if(strlen($val['desc']) > 60){
                $val['desc']=substr($val['desc'],0,60).'·········';
            }
            if($val['is_zhuan'] == 0){
                $val['article_url']='——';
            }
        }
        $data['list']=$list;
        $data['count']=count($data['list']);
        return $data;
    }
    //获取文章全部信息
    public static function getArticleDetails($ar_id) {
        //查询文章
    	$article=Article::getFindById($ar_id);
        //获取文章分类的名字
        $article['type_name']=ArticleType::getFindById($article['id'],'type_name')['type_name'];
        //获取文章的内容
        $article['content']=ArticleContent::getFindById($article['id'],'content')['content'];
        return $article;
    }
}
