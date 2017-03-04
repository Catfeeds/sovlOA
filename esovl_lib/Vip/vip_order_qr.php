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
<title>一休网--订单确认</title>
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
    	<div class="vip_title"><em>订单确认</em></div>
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
                            	<dl><dt>订单确认</dt><dd>&nbsp;</dd></dl>
                            </div>
                            <div class="vip_box_right_b_list01_text_d">

<div class="vip_index_right_box_biaoge_zffs">
                	<dl>
                    <dt>订单编号</dt>
                    <dd><span style="color:#af0000;">100331</span></dd>
                    </dl>
                    <dl>
                    <dt>收件人姓名</dt>
                    <dd>周星星</dd>
                    </dl>
                    <dl>
                    <dt>所在省市</dt>
                    <dd>上海</dd>
                    </dl>
                    <dl>
                    <dt>详细地址</dt>
                    <dd>浦东新区张杨路701号235室</dd>
                    </dl>
                    <dl>
                    <dt>邮政编码</dt>
                    <dd>200208</dd>
                    </dl>
                    <dl>
                    <dt>手机/电话</dt>
                    <dd>13945622586</dd>
                    </dl>
                    <dl>
                    <dt>下单日期</dt>
                    <dd>2010-07-05 13:30:23</dd>
                    </dl>
                    <dl style="height:auto; background-image:url(images/bg_line000.jpg); background-repeat:repeat-y;">
                    <dt style="height:auto">备注</dt>
                    <dd style="height:auto">未填写备注</dd>
                    </dl>
                    <dl>
                    <dt>总价</dt>
                    <dd><strong>￥1100</strong></dd>
                    </dl>
                    <dl>
                    <dt>订单状态</dt>
                    <dd><span style="color:#af0000">等待处理</span></dd>
                    </dl>
                    <div class="vip_index_right_box_biaoge_anniu">
                    <a href="#"><img src="../images/qrdd.jpg"></a>
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