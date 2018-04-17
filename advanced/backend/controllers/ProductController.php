<?php
namespace backend\controllers;
header('content-type:text/html;charset=utf-8');
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Post;
use app\models\Get;
/**
 * Site controller
 */
class ProductController extends Controller
{
    
    public $enableCsrfValidation = false;
	public $layout = false;
	    //商品列表
	   public function actionProduct_list()
	   {
	   	  $res = Yii::$app->db->createCommand("select * from goods,classify,brand where goods.classify_id = classify.classify_id and goods.brand_id = brand.brand_id")->queryAll();
	   	  
	   	  return $this->render('product_list',array('data'=>$res));
	   }
	     //商品分类
	   public function actionProduct_category()
	   {
	   	  return $this->render('product_category');
	   }
	   //添加商品
	  public function actionEdit_product()
	   {
	   	  $all = YII::$app->db->createCommand("select * from classify")->queryAll();
	   	  $str_fu = YII::$app->db->createCommand("select * from classify where classify_pid = 0")->queryAll();
	   	  
	   	  $str_zi = array();

			foreach($all as $key=>$value){
				// var_dump($value);
				foreach($str_fu as $k=>$v){
					// var_dump($value['parent_id']);
					if($v['classify_id'] == $value['classify_pid']){
						 array_push($str_zi,$value);
					}
				}
			}
		  $brand = YII::$app->db->createCommand("select * from brand")->queryAll();
			// var_dump($str_zi);
	   	  return $this->render('edit_product', [
	            'str_fu' => $str_fu,
	            'str_zi' => $str_zi,
	            'brand' => $brand
       		]);
	   }
	  public function actionEdit_product_do(){
	  	  $data = Yii::$app->request->post();
	  	  $time = date('Y-m-d H:i:s');
	  	  // var_dump($data);die;
	  	  $res = YII::$app->db->createCommand()->insert('goods',array(
	  	  	'goods_name'=>$data['goods_name'],
	  	  	'goods_price'=>$data['goods_price'],
	  	  	'classify_id'=>$data['classify_id'],
	  	  	'brand_id'=>$data['brand_id'],
	  	  	'is_hot'=>$data['is_hot'],
	  	  	'time'=>$time
	  	  	))->execute();
	  	  
	  	  if ($res) {
		     Yii::$app->getSession()->setFlash('success','添加成功');
		  } else {
		     Yii::$app->getSession()->setFlash('error','添加失败');
		  }
		  return $this->redirect(array('product/product_sku','goods_name'=>$data['goods_name'],'classify_id'=>$data['classify_id']));
	  }
	  //添加商品规格
	  public function actionProduct_sku()
	   {
	   	  $data = Yii::$app->request->get();
	   	  $goods_name = $data['goods_name'];
			
	   	  $goods = YII::$app->db->createCommand("select * from goods where goods_name='$goods_name'")->queryAll();
		
	   	  $classify_id = $data['classify_id'];
	   	  // var_dump($classify_id);die;
	   	  $attr_fu = Yii::$app->db->createCommand("select * from attribute where classify_id = $classify_id")->queryAll();
	   	  

	   	  // foreach ($attr_fu as $key => $value) {
	   	  // 	$attribute_id[] = $value['attribute_id'];
	   	  // 			foreach ($attribute_id  as $k => $v) {
	   	  // 				$attr_zi[] = Yii::$app->db->createCommand("select * from attr where attribute_id = $v")->queryAll();
	   	  // 			}
	   	  // }
	   	  $attr = Yii::$app->db->createCommand("select * from attribute,attr where attribute.classify_id = $classify_id and attribute.attribute_id = attr.attribute_id")->queryAll();
	   	  $attr_zi = array();
	   	  foreach($attr as $key=>$value){
				foreach($attr_fu as $k=>$v){
					// var_dump($v['attribute_id']);
					if($v['attribute_id'] == $value['attribute_id']){
						 array_push($attr_zi,$value);
					}
				}
			}
	   	  // $attribute_id = array_column($attr, 'attribute_id');
			// var_dump($str_zi);die;
	   	  // $type = Yii::$app->db->createCommand("select * from type")->queryAll();
	   	  return $this->render('product_sku',array('goods' => $goods,'attr_fu'=>$attr_fu,'attr_zi'=>$attr_zi));
	   }
	  public function actionProduct_sku_do(){
	  	$data = Yii::$app->request->post();
	  	// var_dump($data);die;
	  	$attr_id = implode(",",$data['attr_id']);
	  	// var_dump($attr_id);die;
	  	$res = YII::$app->db->createCommand()->insert('sku',array(
	  	  	'goods_id'=>$data['goods_id'],
	  	  	'sku_price'=>$data['sku_price'],
	  	  	'stock'=>$data['stock'],
	  	  	'sku'=>$attr_id
	  	  	))->execute();
	  	if($res){
	  		Yii::$app->getSession()->setFlash('success','添加成功');
	  	}else{
	  		Yii::$app->getSession()->setFlash('error','添加失败');
	  	}
	  	return $this->redirect(array('product/product_list'));
	  
	  }
	    //添加分类
	  public function actionAdd_category()
	   {
	   	  return $this->render('add_category');
	   }
	   //添加属性
	   public function actionAdd_attribute()
	   {
	   	  $all = YII::$app->db->createCommand("select * from classify")->queryAll();
	   	  $str_fu = YII::$app->db->createCommand("select * from classify where classify_pid = 0")->queryAll();
	   	  
	   	  $str_zi = array();

			foreach($all as $key=>$value){
				// var_dump($value);
				foreach($str_fu as $k=>$v){
					// var_dump($value['parent_id']);
					if($v['classify_id'] == $value['classify_pid']){
						 array_push($str_zi,$value);
					}
				}
			}
			// var_dump($str_zi);
	   	  return $this->render('add_attribute', [
	            'str_fu' => $str_fu,
	            'str_zi' => $str_zi
       		]);
	   }
	   public function actionAdd_attribute_do(){
			$data = Yii::$app->request->post();
			$res = YII::$app->db->createCommand()->insert('attribute',array(
	  	  	'classify_id'=>$data['classify_id'],
	  	  	'attribute_name'=>$data['attribute_name']
	  	  	))->execute();
	  	  	if($res){
	  	  		Yii::$app->getSession()->setFlash('success','添加成功');
	  	  	}else{
	  	  		Yii::$app->getSession()->setFlash('error','添加失败');
	  	  	}
	  	  	return $this->redirect(array('product/add_attribute'));
	   }
	   //添加属性值
	  public function actionAdd_attr(){
	  		$attribute = YII::$app->db->createCommand("select * from attribute")->queryAll();

	  		return $this->render('add_attr',[
	            'attribute' => $attribute
       		]);
	  }
	  public function actionAdd_attr_do(){
	  		$data = Yii::$app->request->post();
	  		$res = YII::$app->db->createCommand()->insert('attr',array(
	  	  	'attribute_id'=>$data['attribute_id'],
	  	  	'attr_value'=>$data['attr_name']
	  	  	))->execute();
	  	  	if($res){
	  	  		Yii::$app->getSession()->setFlash('success','添加成功');
	  	  	}else{
	  	  		Yii::$app->getSession()->setFlash('error','添加失败');
	  	  	}
	  	  	return $this->redirect(array('product/add_attr'));
	  }
	  public function actionProduct_sku_update(){
	  	  $data = Yii::$app->request->get();
	   	  $goods_name = $data['goods_name'];
			
	   	  $goods = YII::$app->db->createCommand("select * from goods where goods_name='$goods_name'")->queryAll();
		
	   	  $classify_id = $data['classify_id'];
	   	  // var_dump($classify_id);die;
	   	  $attr_fu = Yii::$app->db->createCommand("select * from attribute where classify_id = $classify_id")->queryAll();
	   	  $attr = Yii::$app->db->createCommand("select * from attribute,attr where attribute.classify_id = $classify_id and attribute.attribute_id = attr.attribute_id")->queryAll();
	   	  $attr_zi = array();
	   	  foreach($attr as $key=>$value){
				foreach($attr_fu as $k=>$v){
					// var_dump($v['attribute_id']);
					if($v['attribute_id'] == $value['attribute_id']){
						 array_push($attr_zi,$value);
					}
				}
			}
		  return $this->render('product_sku_update',array('goods' => $goods,'attr_fu'=>$attr_fu,'attr_zi'=>$attr_zi));
	  }
	  public function actionProduct_sku_update_do(){
	  	$data = Yii::$app->request->post();
	  	$attr_id = implode(",",$data['attr_id']);
	  	$res = YII::$app->db->createCommand()->update('sku',array(
	  	  	'sku_price'=>$data['sku_price'],
	  	  	'stock'=>$data['stock'],
	  	  	'sku'=>$attr_id
	  	  	),'goods_id='.$data['goods_id'])->execute();

	  	if($res){
	  		Yii::$app->getSession()->setFlash('success','修改成功');
	  	}else{
	  		Yii::$app->getSession()->setFlash('error','修改失败');
	  	}
	  	return $this->redirect(array('product/product_list'));
	  
	  }
	   //商品回收站
	    public function actionRecycle_bin()
	   {
	   	  return $this->render('recycle_bin');
	   }
}
