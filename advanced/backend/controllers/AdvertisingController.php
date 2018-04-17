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
class AdvertisingController extends Controller
{
    /**
     * @inheritdoc
     */
    /**
        * 广告展示
        */
   
	   public function actionAdvertising_list()
	   {
	   	  return $this->render('advertising_list');
	   }
     //广告添加
     public function actionAdvertising()
     {
        return $this->render('advertising');
     }
     
  
}
