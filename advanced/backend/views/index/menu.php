<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>左侧导航</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/public.js"></script>
</head>
<body style="background:#313131">
<div class="menu-list">
 <?php foreach ($str_fu as $key => $value): ?>
 <ul>
  <li class="menu-list-title">
   <span><?=$value['node_name'] ?></span>
   <i>◢</i>
  </li>
  <li>
  <?php foreach ($str_zi as $k => $v): ?>
   <ul class="menu-children">
    <?php if($value['node_id'] == $v['parent_id']){ ?>
    <li><a href="<?=$v['node_url'] ?>" title="商品列表" target="mainCont"><?=$v['node_name'] ?></a></li>
    <?php } ?>
   </ul>
    <?php endforeach ?>
  </li>
 </ul>
<?php endforeach ?>
</div>
</body>
</html>