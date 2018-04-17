<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>产品列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/public.js"></script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>产品列表</em></span>
    <span class="modular fr"><a href="http://www.ht.com/index.php?r=brand/add_brand" class="pt-link-btn">+添加品牌</a></span>
  </div>
  <div class="operate">
    <?php $form = ActiveForm::begin(['method'=>'get','action'=>['brand/brand_list']]);?>
                                    <?php echo Html::input('text','brand_name',\Yii::$app->request->get('brand_name'),['placeholder'=>'输入要搜索的用户名'])?>
                                    <?php echo Html::submitButton('搜索',['class'=>'tdBtn']);?>
  <?php $form->end();?>
  </div>
  <table class="list-style Interlaced">
   <tr>
    <th>ID编号</th>
    <th>品牌名称</th>
    <th>品牌logo</th>
    <th>操作</th>
   </tr>
    <?php foreach($arr as $k=>$v){?>
   <tr>
    <td>
     <span>
     <input type="checkbox" class="middle children-checkbox"/>
     <i><?php echo $v['brand_id']?></i>
     </span>
    </td>
    <td class="center"><?php echo $v['brand_name']?></td>
    <td class="td-name">
      <span class="ellipsis td-name block"><img src="<?= Url::to('@web/'.$v['brand_logo']);?>"width="50" height="50"></span>
    </td>
    
    
    <td class="center">
    
     <!-- <a href="edit_product.html" title="编辑"><img src="images/icon_edit.gif"/></a> -->
      <a href="index.php?r=brand/brand_del&brand_id=<?php echo $v['brand_id']?>"  title="删除"><img src="images/icon_drop.gif"/></a>
    
    </td>
    
   </tr>
        <?php }?>
  </table>

  <!-- BatchOperation -->
  <div style="overflow:hidden;">
      <!-- Operation -->
	 
	  <!-- turn page -->
	  <div class="turnPage center fr">
	    <?= LinkPager::widget([ 
    'pagination' => $pagination, 
    'nextPageLabel' => '下一页', 
    'prevPageLabel' => '上一页',
    'firstPageLabel' => '首页', 
    'lastPageLabel' => '尾页',  
]); ?>
	  </div>
  </div>
 </div>
</body>
</html>