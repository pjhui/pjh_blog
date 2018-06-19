<?php
namespace frontend\common\models;

use yii\base\Model;
use app\models\FormField;
use frontend\models\common\User;

class UserForm extends Model{
    public $username;
    public $password;
    public $email;
    public $sex;
    public $age;
    public $phone;
    public $hobby;
    public $desc;
    //表单类型
    public $form_type = [
        1 => 'textInput',
        2 => 'passwordInput',
        3 => 'radioList',
        4 => 'dropDownList',
        5 => 'checkboxList',
        6 => 'textarea',
    ];
    //规则类型
    public $rule_data = [
        1 => 'string',
        2 => 'phone',
        3 => 'email',
        4 => 'unique',
        5 => 'number',
        6 => 'boolean',
    ];
    //存储规则的数组
    public $my_rule = [];
    //存储别的的数组
    public $field_name = [];
    
    //生成规则
    public function rules(){
        return $this->my_rule;
    }
    
    //生成字段别名
    public function attributeLabels() {
        return $this->field_name;
    }
    
    public function get_field_list(){
        //查询表单数据
        $field_list = FormField::find()->where(['is_show' => 1])->asArray()->all();
        $is_must = [];//存储必须的字段 用于设置规则
        foreach($field_list as $field){
            //设置规则
            $this->add_rule($field['field'], $field['rule_type'], $field['rule_desc']);
            //如果要求为必须
            if($field['is_must'] == 1){
                $is_must[] = $field['field'];
            }
            //字段起别名
            $this->field_name[$field['field']] = $field['field_desc'];
        }
        //将必须规则插入规则数组中
        array_push($this->my_rule, [$is_must, 'required']);
        return $field_list;
    }
    
    /*
     * 动态生成规则
     */
    public function add_rule($field_name, $type, $desc = ''){
        if($type == 0){
            return false;
        }
        $rule_type = $this->rule_data[$type];//获取规则类型
        $rule = [];//存储规则
        switch($rule_type){
            case 'string': //字符串类型
                $rule = [
                    $field_name,
                    $rule_type,
                    'length' => explode(',', $desc)
                ];
                break;
            case 'phone': //手机类型  正则
                $rule = [
                    $field_name,
                    'match',
                    'pattern' => '#\d{11}#'
                ];
                break;
            case 'unique': //手机类型  正则
                $rule = [
                    $field_name,
                    $rule_type,
                    'targetClass' => '\frontend\models\User',
                ];
                break;
            default: //其他类型
                $rule = [
                    $field_name,
                    $rule_type,
                ];
                break;
        }
        array_push($this->my_rule, $rule);
    }
    //获取表单的数据
    public function get_options($field){
        $options = [];//存储属性的数组
        switch($field['field_type']){
            case 3: 
                $options = explode(',', $field['field_value']);//单选框
                break;
            case 4: 
                $age_offset = explode(',', $field['field_value']);//下拉框
                $data = range($age_offset[0], $age_offset[1]);
                $options = array_combine($data, $data);
                break;
            case 5: 
                $data = explode(',', $field['field_value']);
                $options = array_combine($data, $data);
                break;
            default: 
                $options = ['placeholder' => $field['field_default']];
                break;
        }
        return $options;
    }
    
    public function register(){
        $model = new User();
        $model->username = $this->username;
        $model->password = md5($this->password);
        $model->sex = $this->sex;
        $model->age = $this->age;
        $model->email = $this->email;
        $model->phone = $this->phone;
        $model->hobby = implode($this->hobby);
        $model->desc = $this->desc;
        return $model->save();
    }
}

