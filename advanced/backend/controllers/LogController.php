<?php
namespace backend\controllers;
header('content-type:text/html;charset=utf-8');
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use app\models\Country;
use app\models\log;
/**
 * Site controller
 */
class LogController extends Controller
{
    /**
     * @inheritdoc
     */
    /**
        * 日志展示
        */
   
	   public function actionLog_list()
	   {
    
         $model = new log();
          $reach = $model::find();
        //判断搜索语句
        if($keywords = Yii::$app->request->get('name')){
             
            $reach->where(['like','name',$keywords]);
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
        
                return $this->render('log_list',['arr'=>$list,
                                        'pagination'=>$pagination,
                                    ]);
          
	   	 	   }
}
