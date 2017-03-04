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
<title>一休网--我的订单--订单提交</title>
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
    	<div class="vip_title"><em>购物车</em></div>
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
                            	<dl><dt>我的购物车</dt><dd>&nbsp;</dd></dl>
                            </div>
                            <div class="vip_box_right_b_list01_text_d">
<div class="gwc">
            	<div class="gwc_title">
                	<dl>
                    <dt style="margin-left:70px;">班级名称</dt>
                    <dd>数量</dd>
                    <dd>价格</dd>
                    </dl>
                </div>                                                   
                <div class="gwc_list">
                    <dl>
                    <dt style="margin-left:70px;">
					<div class="gwc_pro" style="margin-left:12px;">
						<div class="gwc_pro_box">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>[复旦求是]秋季强化全日班（二期）</td>
  </tr>
</table>
						</div>
					</div>
					</dt>
                    <dd><span>￥2520.00</span></dd>
                    <dd><strong>￥2020.00</strong></dd>
                    </dl>
                    <dl>
                    <dt style="margin-left:70px;">
					<div class="gwc_pro" style="margin-left:12px;">
						<div class="gwc_pro_box">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>[复旦求是]秋季强化全日班（二期）</td>
  </tr>
</table>

						</div>
					</div>
					</dt>
                    <dd><span>￥2520.00</span></dd>
                    <dd><strong>￥2020.00</strong></dd>
                    </dl>
					<div class="gwc_js">
						<ul>
						<li>商品总优惠价格<strong>：￥23200.00</strong>元</dt>
						</ul>
					</div>
                </div>
            </div>
<div class="main_order_box_list02">
<div class="vip_index_right_box_tjorder01">填写订单人信息</div>.
<div class="vip_index_right_box_tjorder02">
            <div class="vip_index_right_box_biaoge">
                	<dl>
                    <dt>姓名</dt>
                    <dd><input type="text" name=""></dd>
                    </dl>
                    <dl>
                    <dt>所在省市</dt>
                    <dd>
                    	<select name="">
                    	  <option>请选择省份</option>
                          <option>湖北</option>
                    	</select>
                        <select name="">
                          <option>请选择城市</option>
                        </select>
                        <select name="">
                          <option>请选择地区</option>
                     </select>
                    </dd>
                    </dl>
                    <dl>
                    <dt>详细地址</dt>
                    <dd><input type="text" name=""></dd>
                    </dl>
             		<dl>
                    <dt>邮政编码</dt>
                    <dd><input type="text" name=""></dd>
                    </dl>
                    <dl>
                    <dt>手机/电话</dt>
                    <dd><input type="text" name=""></dd>
                    </dl>
                    <dl style="height:89px;">
                    <dt style="height:89px;">备注</dt>
                    <dd style="height:89px;">
                    <textarea name=""></textarea>
                    </dd>
                    </dl>
                    <div class="vip_index_right_box_biaoge_anniu">
                    <a href="#"><img src="../images/ddtj.jpg"></a>
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
    </div>
</div>
<!-- main End -->
<!-- bottom -->
<?php include("../bottom/bottom.html");?>
<!-- bottom End --> 
</div>
</body>
</html>