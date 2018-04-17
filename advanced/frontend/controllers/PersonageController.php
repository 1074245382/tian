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
   class PersonageController extends Controller
   {
   	   public $layout = false;
       public $enableCsrfValidation = false;
     //个人中心
      public function actionPersonage()
     {
        return $this->render('personage');
     }
      //个人信息
        public function actionInformation()
     {
        return $this->render('information');
     }
      //安全设置
        public function actionSafety()
     {
        return $this->render('safety');
     }
      //收货地址
        public function actionAddress()
     {
        return $this->render('address');
     }
      //订单管理
         public function actionOrder()
     {
        return $this->render('order');
     }
      //足迹
         public function actionFoot()
     {
        return $this->render('foot');
     }
      //评价
         public function actionComment()
     {
        return $this->render('comment');
     }
      //退款售后
         public function actionChange()
     {
        return $this->render('change');
     }
      //消息
         public function actionNews()
     {
        return $this->render('news');
     }
     //修改密码
        public function actionPassword()
     {
        return $this->render('password');
     }
  }
?>