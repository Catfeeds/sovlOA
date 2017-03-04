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
<title>一休网--我的订单--支付</title>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link href="../css/top.css" rel="stylesheet" type="text/css" />
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/bottom.css" rel="stylesheet" type="text/css" />
<link href="../css/vip.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="wrapper">
ss<!-- top -->
<div class="top">
	<div class="top_box01">
    	<div class="top_box01_00"><img src="../images/top01_left.jpg" /></div>
        <div class="top_box01_center">
        	<div class="top_box01_center_text01">您好，欢迎光临一休网！</div>
            <div class="top_box01_center_text02">
            	<ul>
                <li><a href="javascript:void(null);">注册</a><span>|</span></li>
                <li><a href="javascript:void(null);">登陆</a><span>|</span></li>
                <li><a href="javascript:void(null);">我的一休</a><span>|</span></li>
                <li><a href="javascript:void(null);">帮助中心</a><span>|</span></li>
                <li><a href="javascript:void(null);">网站导航</a><span>|</span></li>
                <li><a href="javascript:void(null);"><strong>上海站</strong>-选择城市</a></li>
                </ul>
            </div>
        </div>
        <div class="top_box01_00"><img src="../images/top01_right.jpg" /></div>
    </div>
	<div class="top_box02">
	  <div class="top_box02_logo"><a href="../一休网-会员/index.html"><img src="../images/logo.jpg" /></a></div>
	  <div class="top_box02_search">
	    <div class="top_search">
	      <div class="top_search_box01" id="tb_">
	        <ul>
	          <li id="tb_1" class="hovertab" onclick="HoverLi(1);">
	            <h1><a href="javascript:void(null);">学校</a></h1>
              </li>
	          <li id="tb_2" class="normaltab" onclick="HoverLi(2);">
	            <h1><a href="javascript:void(null);">专业</a></h1>
              </li>
	          <li id="tb_3" class="normaltab" onclick="HoverLi(3);">
	            <h1><a href="javascript:void(null);">高起专/高升本/专升本</a></h1>
              </li>
	          <li id="tb_4" class="normaltab" onclick="HoverLi(4);">
	            <h1><a href="javascript:void(null);">资料</a></h1>
              </li>
            </ul>
          </div>
	      <div class="top_search_box02">
	        <div class="dis" id="tbc_01">
	          <dl>
	            <dt>
	              <input type="text" value="01" name="input" />
                </dt>
	            <dd><a href="javascript:void(null);"><img src="../images/search_anniu.jpg" /></a></dd>
              </dl>
            </div>
	        <div class="undis" id="tbc_02">
	          <dl>
	            <dt>
	              <input type="text" value="02" name="input2" />
                </dt>
	            <dd><a href="javascript:void(null);"><img src="../images/search_anniu.jpg" /></a></dd>
              </dl>
            </div>
	        <div class="undis" id="tbc_03">
	          <dl>
	            <dt>
	              <input type="text" value="03" name="input2" />
                </dt>
	            <dd><a href="javascript:void(null);"><img src="../images/search_anniu.jpg" /></a></dd>
              </dl>
            </div>
	        <div class="undis" id="tbc_04">
	          <dl>
	            <dt>
	              <input type="text" value="04" name="input2" />
                </dt>
	            <dd><a href="javascript:void(null);"><img src="../images/search_anniu.jpg" /></a></dd>
              </dl>
            </div>
          </div>
        </div>
	    <div class="top_box02_search_box02"> <a href="javascript:void(null);">高级搜索</a><br />
	    <a href="javascript:void(null);">使用帮助</a> </div>
      </div>
    </div>
	<div class="top_box03">
        <div class="top_nav">
	<div class="top_nav_box01">
    	<div class="top_nav_box01_list00"><a href="javascript:void(null);">首页</a></div>
        <div class="top_nav_box01_list01" id="nav_tb_">
        	<ul>
            	<li id="nav_tb_1" class="nav_normaltab" onmouseover="navHoverLi(1);" onmouseout="navnoHoverLi();"><h1><a href="javascript:void(null);">学历</a></h1></li>
                <li id="nav_tb_2" class="nav_normaltab" onmouseover="navHoverLi(2);" onmouseout="navnoHoverLi();"><h1><a href="javascript:void(null);">培训</a></h1></li>
                <li id="nav_tb_3" class="nav_normaltab" onmouseover="navHoverLi(3);" onmouseout="navnoHoverLi();"><h1><a href="javascript:void(null);">研修</a></h1></li>
                <li class="nav_normaltab"><a href="javascript:void(null);">留学</a></li>
                <li class="nav_normaltab"><a href="javascript:void(null);">资讯</a></li>
                <li class="nav_normaltab"><a href="javascript:void(null);">社区</a></li>
                <li class="nav_normaltab"><a href="javascript:void(null);">企培</a></li>
                <li class="nav_normaltab"><a href="javascript:void(null);">人才</a></li>
            </ul>
        </div>
    </div>
    <div class="top_nav_box02">
    	<div class="top_nav_box02_box01"><img src="../images/nav_line01.jpg"></div>
        <div class="top_nav_box02_box02">
        	<div class="nav_undis" id="nav_tbc_01">
            	<a href="javascript:void(null);">学历招生</a>
                <a href="javascript:void(null);">自学考试</a>
                <a href="javascript:void(null);">网络院校</a>
                <a href="javascript:void(null);">成人高考</a>
                <a href="javascript:void(null);">中外合作</a>
                <a href="javascript:void(null);">国际中小学</a>
                <a href="javascript:void(null);">高校简章</a>
                <a href="javascript:void(null);">简章搜索</a>
                <a href="javascript:void(null);">高复班</a>
            </div>
            
            <div class="nav_undis" id="nav_tbc_02">
            	<a href="javascript:void(null);">外语</a>
                <a href="javascript:void(null);">职业资格</a>
                <a href="javascript:void(null);">计算机</a>
                <a href="javascript:void(null);">中小学</a>
                <a href="javascript:void(null);">文体</a>
                <a href="javascript:void(null);">驾校</a>
                <a href="javascript:void(null);">会计</a>
                <a href="javascript:void(null);">培训学校</a>
                <a href="javascript:void(null);">免费资料</a>
                <a href="javascript:void(null);">课程超市</a>
                <a href="javascript:void(null);">排行榜</a>
                <a href="javascript:void(null);">优惠</a>
                <a href="javascript:void(null);">专题</a>
                <a href="javascript:void(null);">真题</a>
            </div>
            <div class="nav_undis" id="nav_tbc_03">
            	<a href="javascript:void(null);">MBA/EMBA</a>
                <a href="javascript:void(null);">工程硕士</a>
                <a href="javascript:void(null);">在职研究生</a>
                <a href="javascript:void(null);">总裁总监研修</a>
                <a href="javascript:void(null);">简章大全</a>
                <a href="javascript:void(null);">简章搜索</a>
            </div>
            
            
        </div>
        <div class="top_nav_box02_box03"><img src="../images/nav_line02.jpg"></div>
    </div>
</div>
        
    </div>
</div>
<!-- top End -->

<!-- main -->
<div class="main">
	<div class="vip">
    	<div class="vip_title"><em>购物车</em></div>
        <div class="vip_box">
        	<div class="vip_box_left">
            	<div class="vip_box_left_b1">
                	<div class="vip_box_left_b1_pic"><a href="#"><img src="../images/ipic.jpg" /></a></div>
<div class="vip_box_left_b1_list">
           	  <ul>
                        	<li><span>会员ID：</span>12345678</li>
                            <li><span>一休币：</span>50枚</li>
                <li><span>资料完整度：</span>28%</li>
                </ul>
                  </div>
                    <div class="vip_box_left_b1_set"><a href="#">会员中心首页</a> | <a href="#">个人设置</a> <a href="#" class="ared">退出</a></div>
              	</div>
              	<div class="vip_box_left_b2">
					<div class="vip_box_left_b2_t"><span>欢迎，acking</span></div>
                <div class="vip_box_left_b2_l">
                    	<ul>
                        	<li><a href="#">我的订单</a></li>
                            <li><a href="#" class="ared">购物车</a></li>
                            <li><a href="#">我的收藏</a></li>
                            <li><a href="#">个人信息</a></li>
                            <li><a href="#">修改密码</a></li>
                            <li><a href="#">退出登录</a></li>
           		  		</ul>
                  </div>
              	</div>
    </div>
            <div class="vip_box_right">
            	<div class="vip_box_right_b00">
                	<div class="vip_box_right_b">
                        <div class="vip_box_right_b_list01_d">
                        	<div class="vip_box_right_b_list01_title_d">
                            	<dl><dt>我的购物车</dt><dd>&nbsp;</dd></dl>
                            </div>
                            <div class="vip_box_right_b_list01_text_d">
<div class="vip_grxx">
<div class="vip_index_right_box_biaoge_zffs">
                	<dl>
                    <dt>订单编号</dt>
                    <dd><span style="font-size:16px; font-weight:bold;">2010075663</span></dd>
                    </dl>
                    <dl>



                    <dt>总价</dt>
                    <dd><strong>￥1100</strong></dd>
                    </dl>
                    <dl style="height:78px;">
                    <dt style="height:78px; line-height:78px;">选择支付方式</dt>
                    <dd style="height:78px;">
               	    <div class="zffs">
                        	<input name="" type="radio" value="" /><img src="../images/zf_pic02.jpg" />
                            <input name="" type="radio" value="" /><img src="../images/zf_pic01.jpg" />
                       	 </div>
                    </dd>
                    </dl>
                    <div class="vip_index_right_box_biaoge_anniu">
                    <a href="#"><img src="../images/ljzf.jpg"></a>
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