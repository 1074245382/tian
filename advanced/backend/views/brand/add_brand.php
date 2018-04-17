<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>产品列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="add"></i><em>添加品牌</em></span>
    <span class="modular fr"><a href="product_list.html" class="pt-link-btn">品牌列表</a></span>
  </div>
  <form action="<?php echo Url::to(['add_brand']);?>" method="post" enctype="multipart/form-data">
  <table class="list-style">
   <tr>
    <td style="text-align:right;width:15%;">品牌名称：</td>
    <td><input type="text" name="brand_name" /></td>
   </tr> 
    <tr>
    <td style="text-align:right;width:15%;">品牌LOGO：</td>
    <td>
      <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                         <?= $form->field($brand, 'brand_logo')->fileInput() ?></td>
   </tr> 
    <td style="text-align:right;"></td>
    <td><input type="submit" value="添加" class="tdBtn"/></td>
   </tr>
  </table>
  </form>
 </div>
</body>
</html>