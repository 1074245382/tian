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
   class ShopcartController extends Controller
   {
   	   public $layout = false;
       public $enableCsrfValidation = false;
    
     //加入购物车
       public function actionShopcart()
     {   
        return $this->render('shopcart');
     }
     }
?>