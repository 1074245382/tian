<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * Site controller
 */
class IndexController extends Controller
{
    
    public $enableCsrfValidation = false;
	public $layout = false;
	    //首页
	   public function actionIndex()
	   {
	   	  
	   	  return $this->render('index');
	   }
	   
	   public function actionBar()
	   {
	   	  return $this->render('bar');
	   }
	   //内容
	   public function actionMain()
	   {
	   	  return $this->render('main');
	   }
	   //列表
	   public function actionMenu()
	   {
			$session = Yii::$app->session;
			$admin_name = $session->get('admin_name');
			$res1 = YII::$app->db->createCommand("select * from `admin` where admin_name='$admin_name'")->queryAll();
			$admin_id = $res1[0]['admin_id'];
			$node = YII::$app->db->createCommand("select * from node where node_id in (select node_id from role_node where role_id in (select role_id from admin_role where admin_id = '$admin_id'))")->queryAll();
			$str_fu = YII::$app->db->createCommand("select * from node where node_id in (select node_id from role_node where role_id in (select role_id from admin_role where admin_id = '$admin_id')) and parent_id=0")->queryAll();
			// var_dump($node);die;
			
			$str_zi = array();

			foreach($node as $key=>$value){
				// var_dump($value);
				foreach($str_fu as $k=>$v){
					// var_dump($value['parent_id']);
					if($v['node_id'] == $value['parent_id']){
						 array_push($str_zi,$value);
					}
				}
			}
			// var_dump($str_zi);die;
	   	  	return $this->render('menu', [
	            'str_fu' => $str_fu,
	            'str_zi' => $str_zi
       		]);

	   }
       //头文件
	   public function actionTop()
	   {
	   	  return $this->render('top');
	   }
  
}