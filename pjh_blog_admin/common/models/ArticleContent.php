<?php

namespace pjh_blog_admin\common\models;

use Yii;

/**
 * This is the model class for table "article_content".
 *
 * @property integer $id
 * @property integer $ar_id
 * @property string $content
 * @property integer $time
 */
class ArticleContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ar_id', 'time'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ar_id' => 'Ar ID',
            'content' => 'Content',
            'time' => 'Time',
        ];
    }
    /*
    *根据文章id查询一条内容
    */
    public static function getFindById($id,$field=false){
        $model=self::find()->where(['ar_id'=>$id]);
        if($field) $model->select($field);
        return $model->asArray()->one();
    }
}
