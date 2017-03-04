<?php 
include_once("../conn.php");
include_once("../webstep.php");
?> 
<?php 
if($_SESSION["yes"]!=571){
	echo "<script>alert('您没有登录');location.href='../vip_login.php';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一休网--我的订单</title>
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
    	<div class="vip_title"><em>我的订单</em></div>
        <div class="vip_box">
<?
include("vip_left.php");
?>
        </div>
            <div class="vip_box_right">
            	<div class="vip_box_right_b00">
                	<div class="vip_box_right_b">
                        <div class="vip_box_right_b_list01_d">
                        	<div class="vip_box_right_b_list01_title_d">
                            	<dl><dt>我的订单</dt><dd>&nbsp;</dd></dl>
</div>
                            <div class="vip_box_right_b_list01_text_d">
<div class="zx_qr_02_left_list">
<div class="zx_qr_02_left_list_01_003">
<dl>
<dt>班级名称</dt>
<dd>开课日期</dd>
<dd style="width:95px;">上课地点</dd>
<dd>原价</dd>
<dd>网上优惠</dd>
</dl>
</div>             
<div id="Marquee" class="zx_qr_02_left_list_02_004">
<dl>
<dt><span>[<a href="#">财务管理</a>]<a href="#">2010年专升本B1002(应试技巧班)-高数</a></span></dt>
<dd>预约开班</dd>
<dd style="width:95px;">上海市虹口区西体育会路369号</dd>
<dd style="text-decoration:line-through;">￥310</dd>
<dd><span>￥300</span></dd>
<dd><span><a href="#">详细</a></span></dd>
</dl>
<dl>
<dt><span>[<a href="#">财务管理</a>]<a href="#">2010年专升本B1002(应试技巧班)-高数</a></span></dt>
<dd>预约开班</dd>
<dd style="width:95px;">上海市虹口区西体育会路369号</dd>
<dd style="text-decoration:line-through;">￥310</dd>
<dd><span>￥300</span></dd>
<dd><span><a href="#">详细</a></span></dd>
</dl>
<dl>
<dt><span>[<a href="#">财务管理</a>]<a href="#">2010年专升本B1002(应试技巧班)-高数</a></span></dt>
<dd>预约开班</dd>
<dd style="width:95px;">上海市虹口区西体育会路369号</dd>
<dd style="text-decoration:line-through;">￥310</dd>
<dd><span>￥300</span></dd>
<dd><span><a href="#">详细</a></span></dd>
</dl>
<dl> 
<dt><span>[<a href="#">财务管理</a>]<a href="#">2010年专升本B1002(应试技巧班)-高数</a></span></dt>
<dd>预约开班</dd>					
<dd style="width:95px;">上海市虹口区西体育会路369号</dd>
<dd style="text-decoration:line-through;">￥310</dd>
<dd><span>￥300</span></dd>
<dd><span><a href="#">详细</a></span></dd>
</dl>
</div>
</div>
          	
                            </div>
                        </div>
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