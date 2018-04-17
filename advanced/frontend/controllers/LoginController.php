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
   class LoginController extends Controller
   {
   	   public $layout = false;
       public $enableCsrfValidation = false;
       public $app_key;
       public $app_secret;
       public $back_url;
       public $app_id;
       
        
        
       /**
        * 登陆页面
        */
	   public function actionLogin()
	   {
       
        
	   	  return $this->render('login');
	   }
	   //注册页面
	    public function actionRegister()
	   {
       
        
	   	  return $this->render('register');
	   }


     }
?>