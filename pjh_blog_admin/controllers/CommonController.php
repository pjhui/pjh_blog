<?php
namespace pjh_blog_admin\controllers;
use Yii;
use yii\web\Controller;
/*
公共的控制器
*/
class CommonController extends Controller {
	public $enableCsrfValidation = false;
	//保存用户的信息
	public $userinfo;
	public function init(){
		$session=Yii::$app->session;;
		$uid=$session->get('uid');
		if(!$uid){
			//return $this->redirect(['/user/user-login']);
		}
	}
	//成功时返回数据
	public function Seccess($desc='操作成功',$data=NULL){
		echo json_encode(['result'=>1,'decs'=>$desc,'data'=>$data]);
	}
	//失败时返回数据
	public function Error($desc,$data=NULL){
		echo json_encode(['result'=>0,'decs'=>$desc,'data'=>$data]);
	}
	/*
	*截取字符串
	*/
	public function getSubstr($str,$begin,$end){
		$len=strlen($str);
		$new_str='';
		for($i=$begin;$i<$end;$i++){
			$new_str.=$str[$i];
		}
		return $new_str;
	}
}
?>