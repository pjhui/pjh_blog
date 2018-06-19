<?php

namespace pjh_blog_admin\common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property integer $type_id
 * @property integer $time
 * @property string $desc
 * @property integer $looks
 * @property integer $click_like
 * @property integer $is_line
 * @property integer $ar_sort
 * @property string $cover_url
 * @property integer $is_zhuan
 * @property string $article_url
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'time', 'looks', 'click_like', 'is_line', 'ar_sort', 'is_zhuan'], 'integer'],
            [['title'], 'string', 'max' => 30],
            [['desc'], 'string', 'max' => 100],
            [['cover_url', 'article_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'type_id' => 'Type ID',
            'time' => 'Time',
            'desc' => 'Desc',
            'looks' => 'Looks',
            'click_like' => 'Click Like',
            'is_line' => 'Is Line',
            'ar_sort' => 'Ar Sort',
            'cover_url' => 'Cover Url',
            'is_zhuan' => 'Is Zhuan',
            'article_url' => 'Article Url',
        ];
    }
    /*
    *查询全部的文章
    */
    public static function getFindByAll(){
        /*
        *offset:开始的位置
        *limit:查询几条
        */
        return self::find()->where(['is_line'=>1])->asArray()->All();
    }
    /*
    *根据id查询一条文章
    */
    public static function getFindById($id,$field=false){
        $model=self::find()->where(['id'=>$id]);
        if($field) $model->select($field);
        return $model->asArray()->one();
    }
}
