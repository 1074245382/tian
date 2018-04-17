<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>新增产品分类</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>添加属性值</em></span>
  </div>
  <form action="?r=product/add_attr_do" method="post">
  <table class="list-style">
   <tr>
    <td style="text-align:right;width:15%;">属性名称：</td>
    <td>
    <select class="textBox" name="attribute_id">
	      <?php foreach ($attribute as $k => $v): ?>
	          <option value="<?=$v['attribute_id'] ?>"><?=$v['attribute_name'] ?></option>
	      <?php endforeach ?>
      </select>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">属性值名称：</td>
    <td>
     <input type="text" class="textBox length-long" name="attr_name" />
    </td>
   </tr>
  
   <tr>
    <td style="text-align:right;"></td>
    <td><input type="submit" value="保存" class="tdBtn"/></td>
   </tr>
  </table>
    </form>
 </div>
</body>
</html>