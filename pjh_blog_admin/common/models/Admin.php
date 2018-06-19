<?php

namespace pjh_blog_admin\common\models;

use Yii;
use yii\data\Pagination;
/**
 * This is the model class for table "admin".
 *
 * @property integer $admin_id
 * @property string $admin_name
 * @property string $admin_pwd
 * @property string $admin_email
 * @property integer $time
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'integer'],
            [['admin_name'], 'string', 'max' => 20],
            [['admin_pwd'], 'string', 'max' => 32],
            [['admin_email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'admin_name' => 'Admin Name',
            'admin_pwd' => 'Admin Pwd',
            'admin_email' => 'Admin Email',
            'time' => 'Time',
        ];
    }
    public static function findByInfo($name,$pwd){
        $user_info=self::find()->where(['admin_name'=>$name])->asArray()->one();
        if($user_info){
            if($user_info['admin_pwd'] == md5($pwd)){
                //保存登录状态
                $session=Yii::$app->session;;
                $session->set('uid',$user_info['admin_id']);
                self::api_Seccess('登录成功');
            }else{
                self::Error('密码错误');
            }
        }else{
            self::Error('用户名错误');//yii\base\ErrorException
        }
    }
    //成功时返回数据
    private static function api_Seccess($data=NULL,$desc='操作成功'){
        echo json_encode(['result'=>1,'decs'=>$desc,'data'=>$data]);exit();
    }
    //失败时返回数据
    private static function Error($desc,$data=''){
        echo json_encode(['result'=>0,'decs'=>$desc,'data'=>$data]);exit();
    }
}
