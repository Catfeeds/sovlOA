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
<title>一休网--个人信息</title>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link href="../css/top.css" rel="stylesheet" type="text/css" />
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/bottom.css" rel="stylesheet" type="text/css" />
<link href="../css/vip.css" rel="stylesheet" type="text/css" />
<script src="../js/style.js"></script>
<script src="../js/vip.js"></script>
</head>
<?php   
if (isset($_POST["v_name"])){ 
      $sql="update vip set v_mz='".$_POST["v_name"]."',v_xb='".$_POST["v_xb"]."',v_cs='".$_POST["v_cs"]."',v_diz='".$_POST["v_diz"]."',v_yb='".$_POST["v_yb"]."',v_tel='".$_POST["v_tel"]."',v_email='".$_POST["v_email"]."',v_sr='".$_POST["v_sr"]."' where v_id=".$_SESSION["v_id"];
	 //exit($sql);
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	
      echo"<script>alert('修改成功');location.href='vip_grxx.php';</script>";	  
	  }else{	  
	  exit("更新失败! 错误信息为:".mysql_error());
}}?>
<body>
<div class="wrapper">
<!-- top -->
<?php 
include("../top/top_1.html");
include("../top/index_top1.html");
?>
<!-- top End -->
<!-- main --><?php echo $row[""];?>
<div class="main">
	<div class="vip">
    	<div class="vip_title"><em>个人信息</em></div>
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
                            	<dl><dt>个人信息</dt><dd>&nbsp;</dd></dl>
                            </div>
                            <div class="vip_box_right_b_list01_text_d">                         
<div class="vip_index_right_box_biaoge" style="margin-bottom:0;">
<div class="myslef_pic">
<div class="myslef_pic00">
<img src="../admin_root/<?php echo $row["v_img"];?>" width="118" onLoad="javascript:if(this.width>=this.height&&this.width>=118){this.width=118};if(this.height>this.width&&this.height>=118){this.height=118};"/>
</div>
<h2><a href="#">修改图像</a></h2>
</div>
<form name="creator" method="post" id="creator" onsubmit="return zcXMLHttp()" action="">
                	<dl>
                    <dt>姓 名：</dt>
                    <dd><input name="v_name" type="input" value="<?php echo $row["v_mz"];?>" /><label id="vname" style="color:#F00;"> &nbsp;*</label></dd>
                    </dl>
                    <dl>
                    <dt>性 别：</dt>
                    <dd>
                    <input type="radio" checked="checked"  name="v_xb" id="r01"/><label>男</label>
                    <input type="radio" id="r02"  name="v_xb" /><label>女</label>
                    </dd>
                    </dl>
                    <dl>
                    <dt>城 市：</dt>
                    <dd><input name="v_cs" value="<?php echo $row["v_cs"];?>" type="text" /></dd>
                    </dl>
                    <dl>
                    <dt>现居住地：</dt>
                    <dd><input name="v_diz" type="text" value="<?php echo $row["v_diz"];?>"/></dd>
                    </dl>
                    <dl>
                    <dt>邮政编码：</dt>
                    <dd><input name="v_yb" type="text" value="<?php echo $row["v_yb"];?>"/></dd>
                    </dl>
                    <dl>
                    <dt>手机/电话：</dt>
                    <dd><input name="v_tel" type="text" value="<?php echo $row["v_tel"];?>"/><label style="color:#F00;"> &nbsp;*</label></dd>
                    </dl>
                    <p class="main_box01_center_flash">&nbsp;</p>
                    <dl>
                    <dt>E-mail：</dt>
                    <dd><input name="v_email" type="text" value="<?php echo $row["v_email"];?>"/></dd>
                    </dl>
                    <dl>
                    <dt>生 日：</dt>
                    <dd>
                    <div class="vip_index_right_box_biaoge_sr">
							<input type="text"  name="v_sr" value="<?php echo $row["v_sr"];?>"/>
                            <label style="color:#F00;">格式:xxxx-xx-xx</label>
                    </div>
                    </dd>
                    </dl>
                    <div class="vip_index_right_box_biaoge_anniu">
                    <input type="image" src="../images/bjxx.jpg" />
                    </div>
</form>
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