<?php
include("../conn.php");
include("mb_step.php");
?>
<?php
$rs1=mysql_query("select * from tsfencai where ts_id=".$_GET["tsid"]);
$row1=mysql_fetch_assoc($rs1);
$ts_name=$row1["ts_name"];//名字
$ts_class=$row1["ts_class"];//类别
$ts_date=$row1["ts_date"];//日期
$ts_info=$row1["ts_info"];//风采
$ts_pic=$row1["ts_pic"];//照片
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $ts_name;?>-<?php echo $ts_class;?></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<script src="js/js.js" type="text/javascript"></script>
</head>

<body>

<div class="wrapper">

<!-- top --><!-- top end -->

<!-- main -->
<div class="main">
  <div class="main_xyjs">
    <?php include("mb_top.html");?>
  	<div class="main_xyjs_left">
    	<div class="main_xyjs_left_box01"><img src="images/left_top_bg.jpg" width="656" height="14" /></div>
        <div class="main_xyjs_left_box">
		<div style="padding:0 20px; text-align:right;">当前位置：<a href="index.php">首页</a>-<?php if($ts_class=="teacher"){echo "教师风采";}else{echo "学员风采";}?></a></div>
        	<div class="main_xyjs_left_box_title" style="text-align:center;"><?php echo $ts_name;?></div>
			<div style="text-align:center; padding-top:10px;"> <img src="../admin_root/<?php echo $ts_pic;?>" onload="javascript:if(this.width>400){this.width==400}"></div>
            <div class="main_xyjs_left_box_text">
           <?php echo $ts_info;?>
			</div>
			<div style="padding:0 20px; text-align:right;">[<a href="mb_fc_list.php?tsclass=<?php echo $ts_class;?>">返回列表</a>]　发布日期：<?php echo time_tran($ts_date);?></div>
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
