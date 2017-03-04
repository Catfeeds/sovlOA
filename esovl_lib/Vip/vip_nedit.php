<?php 
include_once("../conn.php");
include_once("../webstep.php");
if($_SESSION["yes"]!=571){
	echo "<script>alert('您没有登录');location.href='../vip_login.php';</script>";
	}
$sql="select * from vip_news where news_id=".$_GET["nid"];
		$rs=mysql_query($sql,$conn);
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
						$news_title=$row["news_title"];
						$news_con=$row["news_con"];
						$news_time=$row["news_time"];
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $row["news_title"];?>详细页面</title>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link href="../css/top.css" rel="stylesheet" type="text/css" />
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/bottom.css" rel="stylesheet" type="text/css" />
<link href="../css/vip.css" rel="stylesheet" type="text/css" />
<script src="../js/style.js"></script>
</head>
<body>
<div class="wrapper">
<!-- top -->
<?php 
include("../top/top_1.html");
include("../top/index_top1.html");
?>
<!-- top End -->
<!-- main -->
<div class="main">
	<div class="vip">
    	<div class="vip_title"><em>会员首页</em></div>
        <div class="vip_box">         
<?
include("vip_left.php");
?>
        </div>
            <div class="vip_box_right">
            	<div class="vip_box_right_ab00">
                     <div class="vip_box_right_b00a1">
                     <?=$news_title;?>
                     </div>
                     <div class="vip_box_right_b00a3">
                      <?=$news_con;?>
               		 </div>
                     <div class="vip_box_right_b00a2">
                      发布时间: <?=$news_time;?>
                     </div>
                     <div class="vip_box_right_b00a4">
                     <a href="vip_nlist.php">返回新闻列表</a>&nbsp;&nbsp;&nbsp;&nbsp;
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main End -->
<!-- bottom -->
<?php include("../bottom/bottom.html");?>
<!-- bottom End -->
</div>
</body>
</html>