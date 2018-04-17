<?php
namespace backend\controllers;
header('content-type:text/html;charset=utf-8');
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use app\models\Country;
use app\models\goods;
use app\models\classify;
use app\models\log;
/**
 * Site controller
 */
class ProductController extends Controller
{
    
 //    public $enableCsrfValidation = false;
	// public $layout = false;
	    //商品列表
	   public function actionProduct_list()
	   {  
          $session = Yii::$app->session;
          $name = $session->get('admin_name');
	   	  $model = new goods();
          $reach = $model::find();
        //判断搜索语句
        if($keywords = Yii::$app->request->get('goods_name')){
             
            $reach->where(['like','goods_name',$keywords]);
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
            $j = "查看商品列表";
            // $sql = $model->save();
            $a = YII::$app->db->createCommand("insert into log (add_time,name,ip,conment) values ('$d','$da','$dat','$j')")->execute();
            // var_dump($data);die;
            // var_dump($sql);die;
            if ($a) {
                return $this->render('product_list',['arr'=>$list,
                                        'pagination'=>$pagination,
                                    ]);
            }else{
                echo "管理员管理查看失败";
            }
        }else{
                echo "查看失败";
        }
	   }
	   //商品删除
    public function actionGoods_del()
    {
        $goods_id=Yii::$app->request->get('goods_id');
        $res = \Yii::$app->db->createCommand()->delete('goods', "goods_id=".$goods_id)->execute();
        if($res){
            echo "<script>alert('删除成功');location.replace(document.referrer);</script>";
        }else{
            echo "<script>alert('删除失败');location.replace(document.referrer)</script>";
        }
    }
	     //商品分类
	   public function actionProduct_category()
	   {
            $session = Yii::$app->session;
            $name = $session->get('admin_name');
           // var_dump($admin_name);die;
           $data = YII::$app->db->createCommand("select *,CONCAT(path,'-',classify_id) as new_path from classify ORDER BY new_path")->queryAll();
            // return $this->render("product_category",array('data'=>$data));
           if ($data) {
            $model = new log;
            $d = time();
            $da = $name; 
            $dat = $_SERVER['REMOTE_ADDR'];
            $j = "商品分类查看";
            // $sql = $model->save();
            $a = YII::$app->db->createCommand("insert into log (add_time,name,ip,conment) values ('$d','$da','$dat','$j')")->execute();
            // var_dump($data);die;
            // var_dump($sql);die;
            if ($a) {
                return $this->render("product_category",array('data'=>$data));
            }else{
                echo "商品分类查看失败";
            }
        }else{
                echo "查看失败";
        }
           // var_dump($data);exit;
          // return $this->render("",array('data'=>$data));
	   	 
	   }
        //删除分类
        public function actionCate_del()
       {
          return $this->render('edit_product');
       }
	   //添加商品
	  public function actionEdit_product()
	   {
	   	  return $this->render('edit_product');
	   }
	    //添加分类
	  public function actionAdd_category()
	   { 
         $data = YII::$app->db->createCommand("select *,CONCAT(path,'-',classify_id) as new_path from classify ORDER BY new_path")->queryAll();
           // var_dump($data);exit;
          return $this->render("add_category",array('data'=>$data));
      
 	   	
	   }
	   //商品回收站
	    public function actionRecycle_bin()
	   {
	   	  return $this->render('recycle_bin');
	   }
       //添加分类
    public function actionAdd_classifcation(){
        $re = YII::$app->db->createCommand("select *,CONCAT(path,'-',cate_id) as new_path from cate ORDER BY new_path")->queryAll();
        // var_dump($res);die;
        return $this->render("add_classifcation",array('re'=>$re));
    }
    //添加分类
    public function actionAdd_classifcation_do(){
        $db = new classify;
        $data = yii::$app->request->post();
        // ar_dump($data);die;
        if($data['classify_id']==0){
            $a= $data['classify_name'];
            $res = Yii::$app->db->createCommand("insert into classify (classify_name,classify_pid,path) values ('$a','0','0')")->execute();
             echo "<script>alert('添加成功');location.href='?r=product/product_category'</script>";
            // return $this->render("add_classifcation");
        }else{
            $classify_id = $data['classify_id'];
            // var_dump($parent_id);die;
            $res = classify::find()->where("classify_id = '$classify_id'")->asArray()->one();
            // var_dump($res);die;
            $classify_pid = $res['classify_pid'];
            $path = $res['path'];
            // var_dump($path);die;
            $db->classify_name = $data['classify_name'];
            // $db->parent_id = $res['parent_id'];
            $a=$db->classify_pid = $data['classify_id'];
            // var_dump($a);die;
            $db->path=$path.'-'.$classify_id;
            $sql = $db->save();
            echo "<script>alert('添加成功');location.href='?r=product/product_category'</script>";
        }
    }
   public function actionClassifcation_del($id){

            $db = new classify;
            $connection = Yii::$app->db;
             //查询出当前分类数据
            $command = $connection->createCommand("select * from classify where classify_id=$id");
            $posts = $command->queryOne();
            //ar_dump($posts);die;
            $classify_id = $posts['classify_id'];
            $dele = "classify_id=$classify_id";
            //查询当前分类的子级数据
            $command = $connection->createCommand("select * from classify where classify_pid=$classify_id");
            $post = $command->queryOne();
            $classify_pid = $post['classify_pid'];
            $de = "classify_pid=$classify_pid";

            if ($post) {
                  echo "<script>alert('当前分类下还有子集，请先删除子集');location.replace(document.referrer);</script>";
            } else {
                echo $delete = $connection->createCommand()->delete('classify', $dele)->execute();
                $this->redirect(['product/product_category']);
            }
    }

}
