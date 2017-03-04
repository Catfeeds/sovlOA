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
<title>一休网--购物车</title>
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
                    <dt>班级名称</dt>
                    <dd>原价</dd>
                    <dd>网上优惠</dd>
                    <dd>操作</dd>
                    </dl>
                </div>                                                     
                <div class="gwc_list">
                	<dl>
                    <dt>
					<div class="gwc_pro">
						<input class="dxh" name="" type="checkbox" value="" />
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
                    <dd>
					<div class="gwc_an">
						<a href="#"><img src="../images/gm.jpg" /></a>
						<a href="#" style=" margin-left:6px;"><img src="../images/sc.jpg" /></a>
					</div>
					</dd>
                    </dl>
                    <dl>
                    <dt>
					<div class="gwc_pro">
						<input class="dxh" name="" type="checkbox" value="" />
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
                    <dd>
					<div class="gwc_an">
						<a href="#"><img src="../images/gm.jpg" /></a>
						<a href="#" style=" margin-left:6px;"><img src="../images/sc.jpg" /></a>
					</div>
					</dd>
                    </dl>
                    <dl>
                    <dt>
					<div class="gwc_pro">
						<input class="dxh" name="" type="checkbox" value="" />
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
                    <dd>
					<div class="gwc_an">
						<a href="#"><img src="../images/gm.jpg" /></a>
						<a href="#" style=" margin-left:6px;"><img src="../images/sc.jpg" /></a>
					</div>
					</dd>
                    </dl>
                    <dl>
                    <dt>
					<div class="gwc_pro">
						<input class="dxh" name="" type="checkbox" value="" />
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
                    <dd>
					<div class="gwc_an">
						<a href="#"><img src="../images/gm.jpg" /></a>
						<a href="#" style=" margin-left:6px;"><img src="../images/sc.jpg" /></a>
					</div>
					</dd>
                    </dl>
                    <dl>
                    <dt>
					<div class="gwc_pro">
						<input class="dxh" name="" type="checkbox" value="" />
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
                    <dd>
					<div class="gwc_an">
						<a href="#"><img src="../images/gm.jpg" /></a>
						<a href="#" style=" margin-left:6px;"><img src="../images/sc.jpg" /></a>
					</div>
					</dd>
                    </dl>
                    <dl>
                    <dt>
					<div class="gwc_pro">
						<input class="dxh" name="" type="checkbox" value="" />
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
                    <dd>
					<div class="gwc_an">
						<a href="#"><img src="../images/gm.jpg" /></a>
						<a href="#" style=" margin-left:6px;"><img src="../images/sc.jpg" /></a>
					</div>
					</dd>
                    </dl>
					<div class="gwc_js">
						<ul>
						<li>商品总优惠价格<strong>：￥23200.00</strong>元</dt>
						<li><a href="#"><img src="../images/okqjs.jpg" /></a></li>
						</ul>
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
<div class="bottom">
	<div class="bottom_box01">
    	<div class="main_box06_top"><img src="../images/bottom_bg_top.jpg" /></div>
        <div class="main_box06_cen">
 			<div class="main_box06_cen_box01">
            	<div class="main_box06_cen_box01_left">合作机构</div>
                <div class="main_box06_cen_box01_right">
                	<ul>
                    <li><a href="#"><img src="../images/h01.jpg" /></a></li>
                    <li><a href="#"><img src="../images/h02.jpg" /></a></li>
                    <li><a href="#"><img src="../images/h03.jpg" /></a></li>
                    <li><a href="#"><img src="../images/h04.jpg" /></a></li>
                    <li><a href="#"><img src="../images/h05.jpg" /></a></li>
                    <li><a href="#"><img src="../images/h06.jpg" /></a></li>
                    <li><a href="#"><img src="../images/h07.jpg" /></a></li>
                    <li><a href="#"><img src="../images/h08.jpg" /></a></li>
                    <li><a href="#"><img src="../images/h08.jpg" /></a></li>
                    </ul>
                </div>
            </div>
            <div class="main_box06_cen_box02">
            	<div class="main_box06_cen_box02_left">友情链接</div>
                <div class="main_box06_cen_box02_right">
                	<ul>
                    <li><a href="#">考试吧</a></li>
                    <li><a href="#">招生网</a></li>
                    <li><a href="#">搜学网</a></li>
                    <li><a href="#">考试大</a></li>
                    <li><a href="#">青年人</a></li>
                    <li><a href="#">学易网</a></li>
                    <li><a href="#">考试网</a></li>
                    <li><a href="#">论文网</a></li>
                    <li><a href="#" style="color:#ff7216;">申请友情链接</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main_box06_top"><img src="../images/bottom_bg_bottom.jpg" /></div>
    </div>
    <div class="bottom_box02">
    	<div class="bottom_box02_01">
        	<ul>
            <li><a href="#"><img src="../images/bottom01.jpg" /></a></li>
            <li><a href="#"><img src="../images/bottom02.jpg" /></a></li>
            </ul>
        </div>
        <div class="bottom_box02_02">
        	<div class="bottom_box02_02_nav">
           	<a href="#">关于我们</a><span>-</span>
            <a href="#">联系我们</a><span>-</span>
            <a href="#">招贤纳士</a><span>-</span>
            <a href="#">客服中心</a><span>-</span>
            <a href="#">免责声明</a>
            </div>
            <div class="bottom_box02_02_dz">
            	联系电话：021-58734554  地址：上海市浦东新区浦建路145号强生大厦25层<br />
                Copyright <span>&copy;</span> 2010, 版权所有 一休网  沪ICP备010101号
            </div>
        </div>
    </div>
</div>
<!-- bottom End -->
</div>
</body>
</html>
