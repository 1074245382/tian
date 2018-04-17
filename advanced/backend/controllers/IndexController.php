<?php
namespace backend\controllers;
header('content-type:text/html;charset=utf-8');
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
	   	  return $this->render('menu');
	   }
       //头文件
	   public function actionTop()
	   {
	   	  return $this->render('top');
	   }
  
}
