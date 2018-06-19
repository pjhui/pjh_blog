<?php
namespace pjh_blog_admin\common\components;
use Yii;
use pjh_blog_admin\common\models\Article;
use pjh_blog_admin\common\models\ArticleContent;
use pjh_blog_admin\common\models\ArticleType;
use yii\helpers\ArrayHelper;
class ArticleTypeComponet extends \yii\db\ActiveRecord{
    //根据分类ID获取分类名字以及父级的名字
    public static function getTypeParentName($id){
        
    }
}
