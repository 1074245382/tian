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
class UserController extends Controller
{
    
    public $enableCsrfValidation = false;
	public $layout = false;
	    //用户列表
	   public function actionUser_list()
	   {
	   	  return $this->render('user_list');
	   }
	   
}
