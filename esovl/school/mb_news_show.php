<?php
include("../conn.php");
include("mb_step.php");
?>
<?php
mysql_query("update tpnews set ne_click=ne_click+1 where ne_id=".$_GET["id"]);
$rs1=mysql_query("select * from tpnews where ne_id=".$_GET["id"]);
$row1=mysql_fetch_assoc($rs1);
$show_name=$row1["ne_name"];//新闻标题
$show_info=$row1["ne_info"];//新闻内容
$show_date=$row1["ne_date"];//日期
$show_nclick=$row1["ne_click"];//点击数
$s_name=$row1["s_name"];//学校名
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $show_name;?>-<?php echo $s_name;?></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<script src="js/js.js" type="text/javascript"></script>
</head>

<body>
<div class="wrapper">
<!-- top -->
<?php include("mb_top.html");?>
<!-- top end -->

<!-- main -->
<div class="main">
  <div class="main_xyjs">
   
  <div class="main_xyjs_left">
      <div class="main_xyjs_left_box01"><img src="images/left_top_bg.jpg" width="656" height="14" /></div>
      <div class="main_xyjs_left_box">
      <div style="padding:0 20px; text-align:right;">当前位置：<a href="index.php">首页</a>-<a href="mb_news_list.php">新闻资讯</a>-详情</div>
        	<div class="main_xyjs_left_box_title" style="text-align:center;"><?php echo $show_name;?></div>
            <div class="main_xyjs_left_box_text">
           <?php echo $show_info;?>
			</div>
			<div style="padding:0 20px; text-align:right;">[<a href="mb_news_list.php">返回列表</a>]　浏览次：<?php echo time_tran($show_nclick);?>　发布日期：<?php echo time_tran($show_date);?></div>
        </div>
        <div class="main_xyjs_left_box01"><img src="images/left_bottom_bg.jpg" width="656" height="14" /></div>
    </div>
    <?php include("mb_left.html");?>
  </div>
</div>
<!-- main end -->

<!-- bottom -->
<?php include("mb_bottom.html");?>
<!-- bottom end -->
</div>
</body>
</html>