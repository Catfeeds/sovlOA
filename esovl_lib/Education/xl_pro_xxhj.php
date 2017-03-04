<?php 
include_once("../web_start.php");
if (isset($_GET["sid"])&&$_GET["sid"]&&isset($_GET["kid"])&&$_GET["kid"]){
	//$_SESSION["sid"]=$_GET["sid"];//国外空间上莫名不能用。以下写数据库代替SESSION传值
	// $num=$dblink->update("school",array("s_bj"=>"0"));//把当前状态都变成非活动
	// setcookie("")setcookie("u_checkstr",$checkstr,$time,"/");
	$row=$dblink->find("school",array(),"s_id='{$_GET["sid"]}'");
	$num=$dblink->update("school",array("s_click"=>$row["s_click"]+1),"s_id='{$_GET["sid"]}'");//更新浏览次数
	$s_name=$row["s_name"];//学院名称
	$s_id=$row["s_id"];
	$s_banner=$row["s_banner"];//学院banner
	$s_xyjs=$row["s_xyjs"];// 学院介绍
	$s_banner=$row["s_banner"];//学院banner
	$s_bxys=$row["s_bxys"];//办学优势
	$s_zsdx=$row["s_zsdx"];//招生对象
	$s_xxhj=$row["s_xxhj"];//学校环境
	$s_kkxx=$row["s_kkxx"];//开课信息
	$s_bmxz=$row["s_bmxz"];//报名须知
	$s_xlxw=$row["s_xlxw"];//学历学位
	$s_click=$row["s_click"];

	$row2=$dblink->find("kkinfo",array(),"kid='{$_GET["kid"]}'");
	$kid=$row2["kid"];
	$zycon=$row2["zycon"];
	$zyclass=$row2["zyclass"];
	$zyname=$row2["zyname"];
}else{
	exit('参数有误！');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $s_name;?>-学校环境-<?php echo $z_name;?></title>
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
        	
            <div class="main_xl_detail_box03_main">
            	<div class="main_xl_detail_box03_main_left">
                	<div id="height01" style="height:20px;"></div>	
                    <div style=" margin:0 40px;"><?php echo $s_xxhj;?></div>
                    
              </div>
            	<div class="main_xl_detail_box03_main_right">
                	<div class="main_xl_detail_box03_main_right_box1">
                    	<dl>
                        <dt><a href="xl_pro_wsbm.php"><img src="<?=$z_website?>images/xl_wsbm_anniu.jpg" /></a></dt>
                   	    <dd>地址：<?php echo $z_address;?></dd>
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