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
    <span class="modular fr"><a href="?r=product/product_list" class="pt-link-btn">商品列表</a></span>
  </div>
  <form action="?r=product/edit_product_do" method="post">
  <table class="list-style">
   <tr>
    <td style="text-align:right;width:15%;">商品名称：</td>
    <td><input type="text" class="textBox length-long" name="goods_name" /></td>
   </tr>
   <tr>
    <td style="text-align:right;">商品分类：</td>
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
    <td style="text-align:right;">品牌分类：</td>
    <td>
     <select class="textBox" name="brand_id">
      <?php foreach ($brand as $key => $value): ?>
        <option value="<?=$value['brand_id'] ?>"><?=$value['brand_name'] ?></option>
      <?php endforeach ?>
     </select>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">商品价格：</td>
    <td>
     <input type="text" class="textBox length-short" name="goods_price" />
     <span>元</span>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">是否热卖：</td>
    <td>
     热卖<input type="radio" class="textBox length-short" name="is_hot" value="1"/>
     不热卖<input type="radio" class="textBox length-short" name="is_hot" value="0" />
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">库存：</td>
    <td>
     <input type="text" class="textBox length-short" name="stock" />
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">商品主图：</td>
    <td>
     <input type="file"  multiple="multiple" id="chanpinzhutu" class="hide"/>
     <label for="chanpinzhutu" class="labelBtn2">本地上传(最多选择N张)</label>
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