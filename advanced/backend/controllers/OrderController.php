<?php
namespace backend\controllers;
header('content-type:text/html;charset=utf-8');
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use app\models\Country;
use app\models\order;
use app\models\log;
/**
 * Site controller
 */
class OrderController extends Controller
{
    
 //    public $enableCsrfValidation = false;
	// public $layout = false;
	    //订单列表
	   public function actionOrder_list()
	   {
	   	  $session = Yii::$app->session;
          $name = $session->get('admin_name');
          $model = new order();
          $reach = $model::find();
        //判断搜索语句
        if($keywords = Yii::$app->request->get('order_number')){
             
            $reach->where(['like','order_number',$keywords]);
        }
        $pagination = new Pagination([
        'defaultPageSize' => 3,//每页显示多少
        'totalCount' => $reach->count(),//总数据数
        ]);


        $list = $reach
                    ->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->asArray()
                    ->all();
                    // echo $list->createCommand()->getRawSql();die;
        // var_dump($list);die;
        if ($list) {
            $model = new log;
            $d = time();
            $da = $name; 
            $dat = $_SERVER['REMOTE_ADDR'];
            $j = "查看订单列表";
            // $sql = $model->save();
            $a = YII::$app->db->createCommand("insert into log (add_time,name,ip,conment) values ('$d','$da','$dat','$j')")->execute();
            // var_dump($data);die;
            // var_dump($sql);die;
            if ($a) {
                return $this->render('order_list',['arr'=>$list,
                                        'pagination'=>$pagination,
                                    ]);
            }else{
                echo "管理员管理查看失败";
            }
        }else{
                echo "查看失败";
        }
        
	   	 
	   }
}
