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
class AdminController extends Controller
{
    /**
     * @inheritdoc
     */
    /**
        * 管理员展示
        */
   
	   public function actionAdmin_list()
	   {
	   	  return $this->render('admin_list');
	   }
       //添加管理员
       public function actionAdd_admin()
       {
          return $this->render('add_admin');
       }
  
}
