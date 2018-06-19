<?php

namespace pjh_blog_admin\common\models;

use Yii;

/**
 * This is the model class for table "article_type".
 *
 * @property integer $type_id
 * @property string $type_name
 * @property string $type_desc
 * @property integer $p_id
 * @property integer $type_time
 * @property integer $is_use
 */
class ArticleType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_id', 'type_time', 'is_use'], 'integer'],
            [['type_name'], 'string', 'max' => 20],
            [['type_desc'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'Type ID',
            'type_name' => 'Type Name',
            'type_desc' => 'Type Desc',
            'p_id' => 'P ID',
            'type_time' => 'Type Time',
            'is_use' => 'Is Use',
        ];
    }
    /*
    *查询全部的分类
    */
    public static function getFindByAll(){
        return self::find()->asArray()->All();
    }
    /*
    *根据id查询一条
    */
    public static function getFindById($id,$field=false){
        $model=self::find()->where(['type_id'=>$id]);
        if($field) $model->select($field);
        return $model->asArray()->one();
    }
}
