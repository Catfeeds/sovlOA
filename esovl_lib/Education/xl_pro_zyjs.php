<?php 
include_once("../conn.php");
include_once("../webstep.php");
include_once("xl_webstep.php");
include("xl_pro_public.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $s_name;?>-专业介绍-<?php echo $z_name;?></title>
<meta name="keywords" content="<?php echo $z_keyword?>" />
<meta name="description" content="<?php echo $z_contant?>" />
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link href="../css/top.css" rel="stylesheet" type="text/css" />
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/bottom.css" rel="stylesheet" type="text/css" />
<script src="../js/style.js"></script>
</head>
<body>
<div class="wrapper">
<!-- top -->
<div class="top">
	<?php 
	include("../top/top_1.html");
	include("../top/xl_top.html");
	?>    
</div>
<!-- top End -->

<!-- main -->
<div class="main">	
    <div class="main_xl_detail">
    <?php include("xl_pro_top.html");?>
        <div class="main_xl_detail_box03">
        	<div class="main_xl_detail_box03_nav">
            	<div class="main_xl_detail_box03_nav00">
                	<ul>
                    <li class="xx_hover"><a href="xl_pro_detail.php">学院介绍</a></li>
                    <li class="xx_hover"><a href="xl_pro_detail.php#bxys">办校优势</a></li>
                    <li class="xx_hover"><a href="xl_pro_detail.php#zsdx">招生对象</a></li>
                    <li class="xx_unhover"><a href="xl_pro_detail.php#zyjs">专业介绍</a></li>
                    <li class="xx_hover"><a href="xl_pro_xxhj.php">学校环境</a></li>
                    <li class="xx_hover"><a href="xl_pro_zxtw.php">在线问答</a></li>
                    <li class="xx_hover"><a href="xl_pro_wsbm.php">网上报名</a></li>
                    <li class="xx_hover"><a href="#">订单查询</a></li>
                    </ul>
                </div>
            </div>
            <div class="main_xl_detail_box03_main">
            	<div class="main_xl_detail_box03_main_left">
                	<div id="height01" style="height:20px;"></div>	
                    <div style=" margin:0 40px;"><?php echo nl2br($zycon);?></div>
                    
              </div>
            	<div class="main_xl_detail_box03_main_right">
                	<div class="main_xl_detail_box03_main_right_box1">
                    	<dl>
                        <dt><a href="xl_pro_wsbm.php"><img src="<?=$z_website?>images/xl_wsbm_anniu.jpg" /></a></dt>
                   	    <dd>地址：上海市浦东新区浦建路145号强生大厦25层</dd>
                        </dl>
                    </div>
                    <div class="main_xl_detail_box03_main_right_box2">
                    	<div class="main_xl_detail_box03_main_right_box2_title">
                            <div class="main_xllb_box01_left_list02_box1_title_zi_xx">
                                <dl>
                                <dt><img src="<?=$z_website?>images/xl_title_left.png"></dt>
                                <dd>开课信息</dd>
                                <dt><img src="<?=$z_website?>images/xl_title_right.png"></dt>
                                </dl>
                            </div>
                        </div>
                        <div class="main_xl_detail_box03_main_right_box2_list">
                       	  <div class="main_xl_detail_bmxz"><?php echo $s_kkxx;?></div>
                        </div>
                    </div>
                    
                    <div class="main_xl_detail_box03_main_right_box2">
                    	<div class="main_xl_detail_box03_main_right_box2_title">
                            <div class="main_xllb_box01_left_list02_box1_title_zi_xx">
                                <dl>
                                <dt><img src="<?=$z_website?>images/xl_title_left.png"></dt>
                                <dd>报名须知</dd>
                                <dt><img src="<?=$z_website?>images/xl_title_right.png"></dt>
                                </dl>
                            </div>
                        </div>
                        <div class="main_xl_detail_box03_main_right_box2_list">
                       	  <div class="main_xl_detail_bmxz"><?php echo $s_bmxz;?></div>
                        </div>
                    </div>
                    <div class="main_xl_detail_box03_main_right_box2">
                    	<div class="main_xl_detail_box03_main_right_box2_title">
                            <div class="main_xllb_box01_left_list02_box1_title_zi_xx">
                                <dl>
                                <dt><img src="<?=$z_website?>images/xl_title_left.png"></dt>
                                <dd>学历与学位</dd>
                                <dt><img src="<?=$z_website?>images/xl_title_right.png"></dt>
                                </dl>
                            </div>
                        </div>
                        <div class="main_xl_detail_box03_main_right_box2_list">
                       	  <div class="main_xl_detail_bmxz"><?php echo $s_xlxw;?></div>
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