<?php 
include_once("../conn.php");
include_once("../webstep.php");
?>
<?php
  if (isset($_POST["user_zhuanye"])){
      $sql="insert into qp_user set user_name='".$_POST["user_name"]."',user_tel='".$_POST["user_tel"]."',user_num='".$_POST["user_num"]."',user_dizhi='".$_POST["user_dizhi"]."',user_mail='".$_POST["user_mail"]."',user_zhuanye='".$_POST["user_zhuanye"]."',user_date=date(now())";

	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('报名成功');location.href='qp_course.php';</script>";  
	  }else{
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
?>
<?php
$sql="select * from qp_kaike_class where kk_id=".$_GET["id"];
		$rs=mysql_query($sql,$conn);
		
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
			$kk_title=$row["kk_title"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企培网上报名</title>
<link href="css/qpcss.css" rel="stylesheet" type="text/css" />
<link href="css/qptop.css" rel="stylesheet" type="text/css" />
<link href="css/qpmain.css" rel="stylesheet" type="text/css" />
<link href="css/qpbottom.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/panduan.js"></script>
</head>

<body>
<div id="wrapper_bg">
<div class="wrapper">
	<!-- strat top -->
	<?php	include_once("top.php");?>
    <!-- end top -->
    <!-- strat main -->
    <div class="main">
    	<div class="new_left">
        	<div class="main_left_box01">
            	<div class="main_left_box01_Ntitle">
                	<span>网上报名</span>
                </div>
                <div class="main_left_box01_list00">
                	<div class="main_left_box01_Nlist">
                      <ul>
                          <li><a href="#">网上报名</a></li>
                      </ul>
                    </div>
                </div>
            </div>
            <?php include_once("left.php");?>
        </div>
        <div class="new_right">
        	<div class="new_right_box">
            	<div class="new_right_box_title">
                	<ul>
                    	<li class="t_icon"><strong>1</strong></li>
           		  <li class="t_title">
                        	<span class="t_cn">网上报名</span>
                            <span class="t_en">Language classes</span>
                      </li>
                      <li class="t_wz">您现在的位置：<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>">一休网</a> > <a href="#">企培频道</a> > <a href="#"><strong>网上报名</strong></a></li>
                    </ul>
              	</div>
                <div class="new_right_box_list_qpkc">
<form name="formnews" method="post" onSubmit="return newsset()" action="">                	
<div class="main_wsbm_box_left_box_list02">
<dl>
<dt>企培课程名</dt>
<dd>
<h2>
<input type="text" name="user_zhuanye" readonly="" value="<?php echo $kk_title;?>">
</h2>
</dl>
<dl>
<dt>姓名</dt>
<dd><h2><input type="text" maxlength="4" onKeyUp="value=value.replace(/[^\u4E00-\u9FA5]/g,'')" name="user_name"><label id="username"></label></h2><span id="bmname"><strong>*</strong>请输入中文名</span></dd>
</dl>
<dl>
<dt>手机/电话</dt>
<dd><h2><input type="text" style="ime-mode:disabled" onKeyPress="if (event.keyCode!=46 &amp;&amp; event.keyCode!=45 &amp;&amp; (event.keyCode&lt;48 || event.keyCode&gt;57)) event.returnValue=false" name="user_tel"><label id="usertel"></label></h2><span id="bmtel"><strong>*</strong>电话和手机至少输入一项</span></dd>
</dl>
<dl>
<dt>身 份 证</dt>
<dd><h2><input type="text" name="user_num"><label id="usernum"></label></h2><span id="bmsfz"><strong>*</strong>用于报名确认，请填写真实身份证号码</span></dd>
</dl>
<dl>
<dt>通讯地址</dt>
<dd><h2><input type="text" name="user_dizhi"><label id="userdizhi"></label></h2><span id="bmaddress"><strong>*</strong>用于寄发相关的材料，非常重要</span></dd>
</dl>
<dl>
<dt>电子邮箱</dt>
<dd>
<h2>
<input type="text" name="user_mail"><label id="usermail"></label>
</h2>
<span id="bmemail"><strong>*</strong>请输入您最常使用的电子邮件地址</span></dd>
</dl>
<dl style="height:100px;">
<dt style="height: 100px;">备注说明</dt>
<dd style="height: 100px;"><textarea style="font-family:Arial, Helvetica, sans-serif" name="user_con"></textarea></dd>
</dl>
<div class="wsbm_anniu"><input type="image" src="images/wsbm.jpg">
</form>
</div>
</div>   
                </div>
            </div>
        </div>
    </div>
    <!-- end main -->
    <!-- strat bottom -->
     <?php	include_once("bottom.php");?>
    <!-- end bottom -->
</body>
</html>