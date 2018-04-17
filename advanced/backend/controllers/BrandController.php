<?php
namespace backend\controllers;
header('content-type:text/html;charset=utf-8');
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use app\models\Country;
use backend\models\Brand;
use yii\web\UploadedFile;
use app\models\log;
/**
 * Site controller
 */
  //品牌展示
class BrandController extends Controller
{
  
	   public function actionBrand_list()
	   {   
          $session = Yii::$app->session;
          $name = $session->get('admin_name');
          $model = new brand();
          $reach = $model::find();
        //判断搜索语句
        if($keywords = Yii::$app->request->get('brand_name')){
             
            $reach->where(['like','brand_name',$keywords]);
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
            $j = "查看品牌管理";
            // $sql = $model->save();
            $a = YII::$app->db->createCommand("insert into log (add_time,name,ip,conment) values ('$d','$da','$dat','$j')")->execute();
            // var_dump($data);die;
            // var_dump($sql);die;
            if ($a) {
               return $this->render('brand_list',['arr'=>$list,
                                        'pagination'=>$pagination,
                                    ]);
            }else{
                echo "管理员管理查看失败";
            }
        }else{
                echo "查看失败";
        }
        
	   	  
	   }
        //品牌删除
    public function actionBrand_del()
    {
        $brand_id=Yii::$app->request->get('brand_id');
        $res = \Yii::$app->db->createCommand()->delete('brand', "brand_id=".$brand_id)->execute();
        if($res){
            echo "<script>alert('删除成功');location.replace(document.referrer);</script>";
        }else{
            echo "<script>alert('删除失败');location.replace(document.referrer)</script>";
        }
    }
    //品牌添加
    public function actionAdd_brand(){
        if ($_POST) {
            $brand = new Brand;
             $data=Yii::$app->request->post();
             $brand->brand_logo  = UploadedFile::getInstance($brand, 'brand_logo');
             //var_dump($brand->brand_logo);die;
            if ($brand->brand_logo) {
                    $brand_logo = 'uploads/'.date('YmdHis').rand(1111,9999).'.'.$brand->brand_logo->extension;
                    //var_dump($brand_logo);die;
                    $brand->brand_logo->saveAs($brand_logo);
                    $brand->brand_logo =$brand_logo;
                    $brand->save();
                    $brand->brand_name = $data['brand_name'];
                    $brand->save();
                    echo "<script>alert('添加成功');location.href='?r=brand/brand_list'</script>";
                }

        } else {
            $brand = new Brand;
            return $this->render('add_brand',['brand' => $brand]);
        }

    }
}