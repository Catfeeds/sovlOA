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
<title><?php echo $s_name;?>-网上报名-<?php echo $z_name;?></title>
<meta name="keywords" content="<?php echo $z_keyword?>" />
<meta name="description" content="<?php echo $z_contant?>" />
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link href="../css/top.css" rel="stylesheet" type="text/css" />
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/bottom.css" rel="stylesheet" type="text/css" />
<script src="../js/style.js"></script>
<script src="../js/xl_fuction.js"></script>
</head>
<?php
if (isset($_POST["bm_name"])){

	$post=$_POST;
	unset($post["x"]);
	unset($post["y"]);
	$post['bm_date']=date("Y-m-d H:i:s",time());
	$num=$dblink->insert('wsbm',$post);
		
	if (!$num){  
		exit("信息录入失败");
	}else{	
	     echo"<script>alert('信息添加成功');location.href='{$_SERVER['REQUEST_URI']}';</script>";
	}       
}
?>
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
                	<div id="height0" style="height:40px;"></div>
                    <div class="main_xl_detail_box03_main_left_box2">
                    	<div class="main_xl_detail_box03_main_left_box2_title"><span>网上报名</span></div>
                        <div class="main_xl_detail_box03_main_left_box2_text">
							<div class="main_xl_wsbm">
                            	<form name="bmform" id="bmform" method="post" onsubmit="return wsbm()" action="">
                        <div class="main_wsbm_box_left_box_list02">
                    	<dl>
                        <dt>学校名称</dt>
                        <dd>
                          <h2 style="background:none">
                            <input type="text" value="<?php echo $s_name;?>" readonly name="bm_xxname"  />
                          </h2>
                          <span id="bmxxname"></span></dd>
                        </dl>
                        
                        <dl>
                        <dt>专业类别</dt>
                        <dd>
                        <select name="bm_zyclass">
                          <!--<option value=0>请选择专业层次</option>-->
						  <?php							
								$rs1=$dblink->findALL("xlcal");
								foreach($rs1 as $row){
						  ?>
							<option value="<?php echo $row["zy_class"];?>"<?php if($row["zy_class"]==$zyclass){ echo "selected";}?>><?php echo $row["zy_class"];?></option>
                          <?php }?>
                        </select><span id="bmzyclass"></span></dd>
                        </dl>
                        
                        <dl>
                        <dt>专业名称</dt>
                        <dd>
                        <select name="bm_zycaption">                        	
                          <?php	
    							$rs0=$dblink->findALL("xlmc");
								foreach($rs0 as $row){
						  ?>
						<option value="<?php echo $row["mc_title"];?>"<?php if($row["mc_title"]==$zyname){ echo "selected";}?>><?php echo $row["mc_title"];?></option>
                          <?php }?>
                        </select><span id="bmzycaption"></span></dd>
                        </dl>
                        
                        <dl>
                        <dt>姓名</dt>
                        <dd><h2><input type="text" name="bm_name" maxlength="4"></h2><span id="bmname"><strong>*</strong>请输入中文名</span></dd>
                        </dl>
                        
                        <dl>
                        <dt>手机/电话</dt>
                        <dd><h2><input type="text" name="bm_tel" onKeyPress="if (event.keyCode!=46 && event.keyCode!=45 && (event.keyCode<48 || event.keyCode>57)) event.returnValue=false" style="ime-mode:disabled"></h2><span id="bmtel"><strong>*</strong>电话和手机至少输入一项</span></dd>
                        </dl>
                        
                        <dl>
                        <dt>身 份 证</dt>
                        <dd><h2><input type="text" name="bm_sfz"></h2><span id="bmsfz"><strong>*</strong>用于报名确认，请填写真实身份证号码</span></dd>
                        </dl>
                        
                        <dl>
                        <dt>通讯地址</dt>
                        <dd><h2><input type="text" name="bm_address"></h2><span id="bmaddress"><strong>*</strong>用于寄发相关的材料，非常重要</span></dd>
                        </dl>
                        
                        <dl>
                        <dt>电子邮箱</dt>
                        <dd>
                          <h2>
                            <input type="text" name="bm_email" />
                          </h2>
                          <span id="bmemail"><strong>*</strong>请输入您最常使用的电子邮件地址</span></dd>
                        </dl>
                        
                      <dl style="height:100px;">
                        <dt style="height: 100px;">备注说明</dt>
                        <dd style="height: 100px;"><textarea name="bm_con" style="font-family:Arial, Helvetica, sans-serif"></textarea></dd>
                        </dl>
                        
                        <div class="wsbm_anniu"><input type="image" src="<?=$z_website?>images/wsbm.jpg"></div>
                        
                  </div>
                                </form>
                            </div>                     	
                        </div>
                    </div>
                    
                </div>
                <div class="main_xl_detail_box03_main_right">
                    <div class="main_xl_detail_box03_main_right_box2" style="margin-top:15px;">
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
                       	  <div class="main_xl_detail_bmxz"><?php echo $s_xyjs;?></div>
                        </div>
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