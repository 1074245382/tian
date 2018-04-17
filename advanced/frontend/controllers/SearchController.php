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
   class SearchController extends Controller
   {
   	   public $layout = false;
       public $enableCsrfValidation = false;
       /**
        * 首页
        */
	   public function actionSearch()
	   { 
	   	  return $this->render('search');
	   }
     }
?>