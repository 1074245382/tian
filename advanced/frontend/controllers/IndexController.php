<?php 
namespace frontend\controllers;
header('content-type:text/html;charset=utf-8');
   use yii;
   use yii\web\Controller;
   use frontend\widgets\Weibo;
   use Freedom;
   /**
    * 展示页面
    * @return [type] [description]
    */
   class IndexController extends Controller
   {
   	   public $layout = false;
       public $enableCsrfValidation = false;
       /**
        * 首页
        */
	   public function actionIndex()
	   { 
	   	  return $this->render('index');
	   }
     }
?>