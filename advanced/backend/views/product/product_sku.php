<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商品添加</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="add"></i><em>编辑/添加产品</em></span>
    <span class="modular fr"><a href="" class="pt-link-btn">添加属性</a></span>
  </div>
  <form action="?r=product/product_sku_do" method="post">
  <table class="list-style">
   <tr>
    <td style="text-align:right;width:15%;">商品名称：</td>
    <td>
        <input type="hidden" name="goods_id" value="<?=$goods[0]['goods_id'] ?>" />
        <input type="text" class="textBox length-long" name="goods_name" value="<?=$goods[0]['goods_name'] ?>" />
      </td>
   </tr>
   <tr id="fu">
    <td style="text-align:right;">商品类型：</td>
    <td>
    <?php foreach ($attr_fu as $key => $value): ?>
     <?=$value['attribute_name'] ?>：
     <select class="textBox" name="attr_id[]">
          <?php foreach ($attr_zi as $k => $v): ?>
              <?php if($v['attribute_id'] == $value['attribute_id']){ ?>
                <option value="<?=$v['attr_id'] ?>"><?=$v['attr_value'] ?></option>
              <?php } ?>
          <?php endforeach ?>
     </select>
     <?php endforeach ?> 
    </td>
   </tr>
    <tr>
      <td style="text-align:right;">商品库存：</td>
      <td><input type="text" class="textBox length-long" name="stock" /></td>
   </tr>
   <tr>
    <td style="text-align:right;">商品价格：</td>
    <td>
     <input type="text" class="textBox length-short" name="sku_price" />
     <span>元</span>
    </td>
   </tr>
  
    <td style="text-align:right;"></td>
    <td><input type="submit" value="发布新商品" class="tdBtn"/></td>
   </tr>
  </table>
  </form>
 </div>
</body>
</html>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  
</script>