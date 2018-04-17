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
    <span class="modular fl"><i></i><em>添加属性</em></span>
  </div>
  <form action="?r=product/add_attribute_do" method="post">
  <table class="list-style">
   <tr>
    <td style="text-align:right;width:15%;">分类名称：</td>
    <td>
    <select class="textBox" name="classify_id">
       <?php foreach ($str_fu as $key => $value): ?>
	      <optgroup label="<?=$value['classify_name'] ?>">
	      <?php foreach ($str_zi as $k => $v): ?>
	        <?php if($value['classify_id'] == $v['classify_pid']){ ?>
	          <option value="<?=$v['classify_id'] ?>"><?=$v['classify_name'] ?></option>
	        <?php } ?>
	      <?php endforeach ?>
	      </optgroup>
	      <?php endforeach ?>
      </select>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">属性名称：</td>
    <td>
     <input type="text" class="textBox length-long" name="attribute_name" />
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