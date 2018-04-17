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
   class SuccessController extends Controller
   {
   	   public $layout = false;
       public $enableCsrfValidation = false;
    
     //支付成功
         public function actionSuccess()
     {   
        return $this->render('success');
     } 
     }
?>