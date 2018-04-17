<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>用户列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/public.js"></script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="user"></i><em>用户列表</em></span>
    
  </div>
  <?php $form = ActiveForm::begin(['method'=>'get','action'=>['user/user_list']]);?>
                                    <?php echo Html::input('text','user_account',\Yii::$app->request->get('user_account'),['placeholder'=>'输入要搜索的用户名'])?>
                                    <?php echo Html::submitButton('搜索',['class'=>'tdBtn']);?>
  <?php $form->end();?>
  </div>
  <table class="list-style Interlaced">
   <tr>
     <th>用户ID</th>
     <th>用户账号</th>
     <th>用户密码</th>
     <th>用户手机号</th>
     <th>添加时间</th>
     <th>用户头像</th>
     <th>用户名称</th>
     <th>用户最后登录时间</th>
     <th>用户最后的登录Ip</th>
  
   </tr>
   <tr>
     <?php foreach($arr as $k=>$v){?>
    <td>
    
     <span class="middle"><?php echo $v['user_id']?></span>
    </td>
    <td class="center"><?php echo $v['user_account']?></td>
    <td class="center"><?php echo $v['user_password']?></td>
    <td class="center"><?php echo $v['user_tel']?></td>
    <td class="center"><?php echo $v['user_time']?></td>
    <td class="center">
     <span>
      
     <?php echo $v['user_img']?>
     </span>
    </td>
    <td class="center">
     <span>
      <?php echo $v['nickname']?>
     </span>
    </td>
    <td class="center">
     <span>
      <?php echo $v['lasttime']?>
     </span>
    </td>
    <td class="center"><?php echo $v['lastip']?></td>
    
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