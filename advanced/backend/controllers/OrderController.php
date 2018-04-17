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
class OrderController extends Controller
{
    
    public $enableCsrfValidation = false;
	public $layout = false;
	    //订单列表
	   public function actionOrder_list()
	   {
	   	  return $this->render('order_list');
	   }
}
