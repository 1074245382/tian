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
    <span class="modular fr"><a href="http://www.ht.com/index.php?r=product/edit_product" class="pt-link-btn">+添加商品</a></span>
  </div>
  <div class="operate">
   <form>
    <select class="inline-select">
     <option>A店铺</option>
     <option>B店铺</option>
    </select>
    <input type="text" class="textBox length-long" placeholder="输入产品名称..."/>
    <input type="button" value="查询" class="tdBtn"/>
   </form>
  </div>
  <table class="list-style Interlaced">
   <tr>
    <th>ID编号</th>
    <th>商品名称</th>
    <th>商品价格</th>
    <th>商品分类</th>
    <th>商品品牌</th>
    <th>是否热销</th>
    <th>商品图片</th>
    <th>操作</th>
   </tr>
   <?php foreach ($data as $key => $value): ?>
   <tr>
    <td>
     <span>
     <input type="checkbox" class="middle children-checkbox"/>
     <i><?=$value['goods_id'] ?></i>
     </span>
    </td>
    <td class="center">
      <span class=""><?=$value['goods_name'] ?></span>
    </td>
    <td class="center">
     <span>
      <i>￥</i>
      <em><?=$value['goods_price'] ?></em>
     </span>
    </td>
    <td class="center">
      <span class=""><?=$value['classify_name'] ?></span>
    </td>
    <td class="center">
      <span class=""><?=$value['brand_name'] ?></span>
    </td>
    <td class="center">
        <?php if($value['is_hot'] == 1){ ?>
            <img src="images/yes.gif"/>
        <?php }else{ ?>
            <img src="images/no.gif"/>
        <?php } ?>
      </td>
    </td>
    <td class="center"><img src="#"/></td>
    <td class="center">
     <a href="" title="查看"><img src="images/icon_view.gif"/></a>
     <a href="?r=product/product_sku_update&classify_id=<?=$value['classify_id'] ?>&goods_name=<?=$value['goods_name'] ?>" title="编辑"><img src="images/icon_edit.gif"/></a>
     <a href="" title="删除"><img src="images/icon_drop.gif"/></a>
    </td>
   </tr>
  <?php endforeach ?>
  </table>
  <!-- BatchOperation -->
  <div style="overflow:hidden;">
      <!-- Operation -->
	  <div class="BatchOperation fl">
	   <label for="del" class="btnStyle middle">全选</label>
	   <input type="button" value="批量删除" class="btnStyle"/>
	  </div>
	  <!-- turn page -->
	  <div class="turnPage center fr">
	   <a>第一页</a>
	   <a>1</a>
	   <a>最后一页</a>
	  </div>
  </div>
 </div>
</body>
</html>