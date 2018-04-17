<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>添加管理员</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="add_user"></i><em>添加管理员</em></span>
  </div>
  
</div>
  <form action="<?php echo Url::to(['admin/add_admin_do']);?>" method="post">
  <table class="list-style">
   <tr>
    <td style="width:15%;text-align:right;">管理员昵称：</td>
    <td><input type="text"  name="admin_name" class="textBox length-middle"/></td>
   </tr>
   
   <tr>
    <td style="text-align:right;">管理员密码：</td>
    <td><input type="password" name="admin_pwd" class="textBox length-middle"/></td>
   </tr>
   
   <tr>
    <td style="text-align:right;"></td>
    <td><input type="submit" class="tdBtn" value="添加新管理员"/></td>
   </tr>
  </table>
  </form>
 </div>
</body>
</html>