<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>订单列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/public.js"></script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="order"></i><em>订单列表</em></span>
  </div>
  <div class="operate">
    <?php $form = ActiveForm::begin(['method'=>'get','action'=>['order/order_list']]);?>
                                    <?php echo Html::input('text','order_number',\Yii::$app->request->get('order_number'),['placeholder'=>'输入要搜索的用户名'])?>
                                    <?php echo Html::submitButton('搜索',['class'=>'tdBtn']);?>
  <?php $form->end();?>
  <!--  <form>
    <img src="images/icon_search.gif"/>
    <input type="text" class="textBox length-long" placeholder="输入订单编号或收件人姓名..."/>
    <select class="inline-select">
     <option>未付款</option>
     <option>已付款</option>
    </select>
    <input type="button" value="查询" class="tdBtn"/>
   </form> -->
  </div>
  <table class="list-style Interlaced">
   <tr>
    <th>id</th>
    <th>用户ID</th>
    <th>订单编号</th>
    <th>订单状态</th>
    <th>订单时间</th>
    <th>手机号</th>
    <th>收货地址</th>
    <th>用户姓名</th>
    <th>支付时间</th>
    <th>支付类型</th>
    <th>支付状态</th>
    <th>商品价格</th>
    <th>订单总价</th>
    <th>操作</th>
   </tr>
   <?php foreach($arr as $k=>$v){?>
   <tr>
    <td>
     
     <a href="order_detail.html"><?php echo $v['order_id']?></a>
    </td>
    <td class="center"><?php echo $v['user_id']?></td>
    <td class="center"><?php echo $v['order_number']?></td>
    <td class="center"><?php echo $v['order_status']?></td>
    <td class="center"><?php echo $v['order_time']?></td>
    <td class="center"><?php echo $v['receipt_tel']?></td>
    <td class="center"><?php echo $v['receipt_address']?></td>
    <td class="center"><?php echo $v['user_name']?></td>
    <td class="center"><?php echo $v['payment_time']?></td>
    <td class="center"><?php echo $v['payment_type']?></td>
    <td class="center"><?php echo $v['payment_status']?></td>
    <td class="center"><?php echo $v['goods_price']?></td>
    <td class="center"><?php echo $v['price_total']?></td>
    <td class="center">
     <a href="order_detail.html" class="inline-block" title="查看订单"><img src="images/icon_view.gif"/></a>
    <!--  <a class="inline-block" title="删除订单"><img src="images/icon_trash.gif"/></a> -->
    </td>
   </tr>
       <?php }?>
  </table>
  <!-- BatchOperation -->
  <div style="overflow:hidden;">
      <!-- Operation -->
	  <!-- <div class="BatchOperation fl">
	   <input type="checkbox" id="del"/>
	   <label for="del" class="btnStyle middle">全选</label>
	   <input type="button" value="打印订单" class="btnStyle"/>
	   <input type="button" value="配货" class="btnStyle"/>
	   <input type="button" value="删除订单" class="btnStyle"/>
	  </div> -->
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