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
class LoginController extends Controller
{
    /**
     * @inheritdoc
     */
    /**
        * 登陆页面
        */
    public $enableCsrfValidation = false;
	public $layout = false;
	  public function actionLogin()
    {
        return $this->render('login');
    }
    public function actionLogin_do()
    {
        $data = Yii::$app->request->post();
        
        $admin_name = $data['admin_name'];
        $admin_pwd = $data['admin_pwd'];
        // var_dump($admin_name);die;
        $res=\YII::$app->db->createCommand("select * from `admin` where admin_name='$admin_name' AND admin_pwd='$admin_pwd'")->queryAll();
        // var_dump($res);die;
        if($res){
            $session = Yii::$app->session;
            $session->set('admin_name',$admin_name);
            $this->redirect('?r=index/index');
        }else{
            return $this->render('login');
        }
    }

  
}
