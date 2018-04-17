<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>管理员列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/public.js"></script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="user"></i><em>管理员列表</em></span><br>
    <?php $form = ActiveForm::begin(['method'=>'get','action'=>['log/log_list']]);?>
                                    <?php echo Html::input('text','name',\Yii::$app->request->get('name'),['placeholder'=>'输入要搜索的用户名'])?>
                                    <?php echo Html::submitButton('搜索',['class'=>'tdBtn']);?>
  <?php $form->end();?>
  </div>
  <table class="list-style Interlaced">
   <tr>
    <th>id</th>
    <th>操作内容</th>
    <th>操作时间</th>
    <th>操作人</th>
    <th>ip</th>
   </tr>
  <?php foreach($arr as $k=>$v){?>
   <tr>
    <td><?php echo $v['admin_id']?></td>
    <td><?php echo $v['conment']?></td>
    <td><?php echo date('Y-m-d H:i:s',$v['add_time']);?></td>
    <td><?php echo $v['name']?></td>
    <td><?php echo $v['ip']?></td>
   </tr>
   <?php }?>

  </table>
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
</body>
</html>